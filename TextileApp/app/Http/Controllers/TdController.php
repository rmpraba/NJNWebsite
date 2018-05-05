<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use DB;
use Session;
use App\batches;
use App\users;
use App\training_centres;
use App\districts;
use App\training_centre_subjects;
use App\states;
use App\types_of_centres;
use App\sequences;
use App\training_batches;

class TdController extends Controller
{

     public function show($centreid)
    {   
        
        $districts=districts::all();
        $states=states::all();
        $types_of_centres=types_of_centres::all();
        $training_centre_subjects=training_centre_subjects::all();
        
        $training_centres['training_centres']=training_centres::where('centre_id',$centreid)->get();

        return view('tdview.viewtcedit',$training_centres,compact('districts','states','types_of_centres','training_centre_subjects'));

    }

     public function tcform(Request $ob)
    {
        $username=session()->get('username');
        $password=session()->get('password');

        $valiueofemil=$ob->email;
        
        $usercall= new users();
        $info = $usercall->fetchUserInfo($username,$password);
        $district=$info[0]->district;

        $districtcall=new districts();
        $division = $districtcall->fetchDivisionInfo($district);
        $div=$division[0]->division;

        $districts = $districtcall->fetchDistrict();

        $subjectcall= new training_centre_subjects();
        $subjects = $subjectcall->fetchSubject();

        $statecall = new states();
        $states = $statecall->fetchState();

        $centretypecall=new types_of_centres();
        $tocs = $centretypecall->fetchCentreTypes();

        return view('tdview.training_center_form',compact('districts','states','tocs','district','div','subjects'));
    }
    
    public function insert(Request $req)
    {    
        $username=session()->get('username');
        $password=session()->get('password');

        $usercall= new users();
        $info = $usercall->fetchUserInfo($username,$password);
        $district=$info[0]->district;

        $districtcall=new districts();
        $districtinfo = $districtcall->fetchDivisionInfo($district);
        $district_code= $districtinfo[0]->district_code;

        $seqcall = new sequences();
        $seqinfo = $seqcall->fetchSequence();
        $centre_id=$seqinfo[0]->centre_id;
        if($centre_id<10)
            $centre_id="0".$centre_id;
        $centre_prefix=$seqinfo[0]->centre_prefix;
        $centre_code=$district_code.$centre_prefix.$centre_id;
        $newcentre_id=$centre_id+1;

        $newid = array('centre_id'=>$newcentre_id);
        $seqcall->updateSequence($newid);

        $training_centre = new training_centres;
        $training_centre->name=$req->name;
        $training_centre->centre_id=$centre_code;
        $training_centre->centre_name=$req->centre_name;
        $training_centre->district_id=$district_code;
        $training_centre->upload_pic='data';
        $training_centre->street=$req->street;
        $training_centre->district=$req->district; 
        $training_centre->state=$req->state;  
        $training_centre->pin_code=$req->pin;
        $training_centre->email=$req->email;
        $training_centre->mobile_number=$req->mobile;
        $training_centre->landline=$req->landline;
        $training_centre->website_id=$req->websiteid;
        $training_centre->pan_card=$req->pancard; 
        $training_centre->pan_card_image='data';
        $training_centre->gst=$req->gst;
        $training_centre->gst_image='data';
        $training_centre->training_start=$req->trainingstart;
        $training_centre->training_end=$req->trainingend; 
        $training_centre->adhar_card=$req->adhar;
        $training_centre->adhar_card_image='data';
        $training_centre->centre_type=$req->centre;
        $training_centre->training=$req->training;
        $training_centre->centre_status="active";
        $training_centre->save();
        if($training_centre->save()){
            return view('pages.success');
        }
        else{
            echo "insertion faild";
        }
    }


    public function fetchtclist(Request $obj)
    {
      $tccall=new training_centres();
      $tcinfo = $tccall->fetchTcList();  
      return view('tdview.viewtc')->with(array('tcinfo'=>$tcinfo));
    }
    public function deletetcview($centreid)
    { 
        $tccall=new training_centres();
        $tc = $tccall->deleteTc($centreid);
        return view('pages.success');  
    }


    public function fetchbatchlistview(Request $obj)
    {
        $batchcall = new batches();
        $batchinfo=$batchcall->fetchBatchList(); 
        return view('tcview.viewbatchlist')->with(array('batchinfo'=>$batchinfo));
    }
    public function fetchbatchlist(Request $obj)
    {
        $batchcall = new batches();
        $batchinfo = $batchcall->fetchPendingBatchList();
        return view('tdview.viewbatch')->with(array('batchinfo'=>$batchinfo));
    }
    public function approveBatch($id)
    {
        $batchcall = new batches();
        $new_batch_data = array('status'=>"Approved");
        $batch = $batchcall->approveBatch($id,$new_batch_data);

        $batchinfo = $batchcall->fetchBatchSpecInfo($id);

        $data1 = array("centre_id"=>$batchinfo[0]->centre_id,"batch_id"=>$batchinfo[0]->batch_id,"batch_name"=>$batchinfo[0]->batch_name,"status"=>$batchinfo[0]->status,"created_by"=>$batchinfo[0]->created_by,"batch_type"=>$batchinfo[0]->training_type);

        $trainingbatchcall = new training_batches();
        $tb=$trainingbatchcall->insertTrainingBatch($data1);
        return view('pages.success');
    }
    public function rejectBatch($id)
    { 
        $batchcall = new batches();
        $new_batch_data = array('status'=>"Rejected");
        $batch = $batchcall->rejectBatch($id,$new_batch_data);
        return view('pages.success');  
    }

   
}
