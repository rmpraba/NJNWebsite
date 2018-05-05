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
use App\training_centres;

class TdController extends Controller
{
     public function tcform(Request $ob)
    {
        $username=session()->get('username');
        $password=session()->get('password');


        $valiueofemil=$ob->email;

        $info = DB::select('SELECT * FROM users WHERE username = ? AND password = ?' , [$username,$password]);
        $district=$info[0]->district;

        $division = DB::select('SELECT * FROM districts WHERE district_name= ?' , [ $district ]);
        $div=$division[0]->division;

        $districts = DB::select('select * from districts');
        $subjects = DB::select('select * from training_centre_subjects');
        $states = DB::select('select * from states');
        $tocs = DB::select('select * from types_of_centres');
        return view('tdview.training_center_form',compact('districts','states','tocs','district','div','subjects'));
        // return view('tdview.training_center_form',['districts'=>$districts],['toc'=>$tocs]); 
    }
    
    public function insert(Request $req)
    {    
        $username=session()->get('username');
        $password=session()->get('password');

        $info = DB::select('SELECT * FROM users WHERE username = ? AND password = ?' , [$username,$password]);
        $district=$info[0]->district;
        $districtinfo = DB::select('SELECT * FROM districts WHERE district_name=?' , [$district]);
        $district_code= $districtinfo[0]->district_code;
        $seqinfo = DB::select('SELECT * FROM sequences');
        $centre_id=$seqinfo[0]->centre_id;
        if($centre_id<10)
            $batch_id="0".$centre_id;
        $centre_prefix=$seqinfo[0]->centre_prefix;
        $centre_code=$district_code.$centre_prefix.$centre_id;
        $newcentre_id=$centre_id+1;
        DB::update('update sequences set centre_id = ?',[$newcentre_id]);


        $training_centre = new training_centres;
        $training_centre->name=$req->name;
        $training_centre->centre_id=$centre_code;
        $training_centre->centre_name=$req->centre_name;
        $training_centre->district_id='data';
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
     $tcinfo = DB::select('SELECT * FROM training_centres');  
      return view('tdview.viewtc')->with(array('tcinfo'=>$tcinfo));
    }
     public function deletetcview($centreid)
    { 
         // DB::delete('delete from training_centres WHERE centre_id=?',[$centreid]);
        $tc = training_centres::where('centre_id', $centreid);
        $tc->delete();
        return view('pages.success');  
    }



    public function fetchbatchlistview(Request $obj)
    {
     $batchinfo = DB::select('SELECT * FROM batches');  
      return view('tcview.viewbatchlist')->with(array('batchinfo'=>$batchinfo));
    }
    public function fetchbatchlist(Request $obj)
    {
     // -- $batchinfo = DB::select('SELECT * FROM batches WHERE status="Pending"');  
      $batchinfo = batches::where('status', "Pending")->get();
      return view('tdview.viewbatch')->with(array('batchinfo'=>$batchinfo));
    }
    public function approveBatch($id)
    {
        // DB::update('update batches set status="Approved" WHERE batch_id=?',[$id]); 
        $new_batch_data = array('status'=>"Approved");
        $batch = batches::where ('batch_id', $id)->update($new_batch_data);
        $batchinfo = batches::where('batch_id', $id)->get();
        // $batchinfo = DB::select('SELECT * FROM batches WHERE batch_id= ? ',[$id]);
        $data1 = array("centre_id"=>$batchinfo[0]->centre_id,"batch_id"=>$batchinfo[0]->batch_id,"batch_name"=>$batchinfo[0]->batch_name,"status"=>$batchinfo[0]->status,"created_by"=>$batchinfo[0]->created_by,"batch_type"=>$batchinfo[0]->training_type);
        DB::table('training_batches')->insert(array($data1));  
        return view('pages.success');
    }
    public function rejectBatch($id)
    { 
        // DB::update('update batches set status="Rejected" WHERE batch_id=?',[$id]); 
        $new_batch_data = array('status'=>"Rejected");
        $batch = batches::where ('batch_id', $id)->update($new_batch_data);

        return view('pages.success');  
    }

   
}
