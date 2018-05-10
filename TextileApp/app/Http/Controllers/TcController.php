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
use App\physical_target;
use App\financial_target;

class TcController extends Controller
{
    public function batch()
    {        
        return view('tcview.batchcreate');
    }
    public function batchinsert(Request $obj)
    {
        $username=session()->get('username');
        $password=session()->get('password');
        
        $usercall= new users();
        $info = $usercall->fetchUserInfo($username);
        $district=$info[0]->district;
        $centreid=$info[0]->centre_id;

        $districtcall=new districts();
        $districtinfo = $districtcall->fetchDivisionInfo($district);
        $district_code= $districtinfo[0]->district_code;

        $seqcall = new sequences();
        $seqinfo = $seqcall->fetchSequence();      
        $batch_id=$seqinfo[0]->batch_id;
        if($batch_id<10)
            $batch_id="0".$batch_id;
        $batch_prefix=$seqinfo[0]->batch_prefix;
        $batch_code=$district_code.$batch_prefix.$batch_id;
        $newbatch_id=$batch_id+1;

        $newid = array('batch_id'=>$newbatch_id);
        $seqcall->updateSequence($newid);
        
        $bat =new batches;
        $bat->batch_id=$batch_code;
        $bat->district_id=$district_code;
        $bat->batch_name=$obj->batchname;
        $bat->training_type=$obj->trainingtype;
        $bat->no_of_stud=$obj->noofstud;
        $bat->start_date=$obj->startdate;
        $bat->end_date=$obj->enddate;
        $bat->status="Pending";
        $bat->centre_id=$centreid;
        $bat->save();
        if ($bat->save()) {
            return view('pages.success');
        }
        else
        {
            echo"insertion failed";
        }
    }
    public function editbatchlist($batchid)
    {  
        $batchcall=new batches();        
        $batchinfo = $batchcall->fetchBatchSpecInfo($batchid);
        $start = strtotime($batchinfo[0]->start_date);
        $startdate = date('Y-m-d',$start);
        $end = strtotime($batchinfo[0]->end_date);
        $enddate = date('Y-m-d',$end);
        return view('tcview.editbatchlist',compact('batchinfo'),['startdate'=>$startdate,'enddate'=>$enddate]);
    }
     public function batchupdate(Request $req)
    { 
        $new_batch_data = array('batch_name'=>$req->input('batchname'),'training_type'=>$req->input('trainingtype'),'start_date'=>$req->input('startdate'),'end_date'=>$req->input('enddate'),'no_of_stud'=>$req->input('noofstud'));
        $batchid = $req->input('batchid');

        $batch=new batches();
        $batch->updateBatch($new_batch_data,$batchid);
        return view('pages.success');  
    }
     public function deletebatchlist($batchid)
    { 
        $batch=new batches();
        $batch->deleteBatch($batchid);
        return view('pages.success'); 
    }

    public function pftargetfetch(Request $req)
    {
        $tc = new training_centres();
        $tcs =  $tc->fetchtcforList();
        return view('tcview.pftarget',compact('tcs'));
    }
    public function getBatchList($id)
    {
        $tb = new training_batches();
        $batches=$tb->fetchtrainingBatch($id);
        return json_encode($batches);
    } 
    public function getBatchInfo($id)
    {
        $info = DB::table('training_batches')->join('training_centres','training_centres.centre_id','=','training_batches.centre_id')->join('batches','batches.batch_id','=','training_batches.batch_id')->join('districts','districts.district_code','=','training_centres.district_id')->where('training_batches.batch_id','=',$id)->select('training_batches.batch_type','training_centres.centre_type','batches.start_date','batches.end_date','districts.district_name','districts.division',
            'districts.district_code')->get();
        return json_encode($info);          
    }  


     public function viewpftargetfetch(Request $req)
    {
        $tc = new training_centres();
        $tcs =  $tc->fetchtcforList();
        return view('tcview.viewpftarget',compact('tcs'));
    }
    public function viewgetBatchList($id)
    {
        $tb = new training_batches();
        $batches=$tb->fetchtrainingBatch($id);
        return json_encode($batches);
    } 
    public function viewgetBatchInfo($id)
    {
        $info = DB::table('training_batches as b')->join('training_centres as t','t.centre_id','=','b.centre_id')->join('batches as ba','ba.batch_id','=','b.batch_id')->join('districts as d','d.district_code','=','t.district_id')->join('physical_targets as p','p.centre_id','=','b.centre_id')->join('financial_targets as f','f.centre_id','=','b.centre_id')->where('b.batch_id','=',$id)->select('ba.start_date','ba.end_date','b.batch_type','t.centre_type','d.district_name','d.district_code','d.division','p.general_male_target as genpm','p.general_female_target as genpf','p.general_total_target as genpt','p.tsp_male_target as tsppm','p.tsp_female_target as tsppf','p.tsp_total_target as tsppt','p.scp_male_target as scppm','p.scp_female_target as scppf','p.scp_total_target as scppt','p.min_male_target as minpm','p.min_female_target as minpf','p.min_total_target as minpt','f.general_male_target as genfm','f.general_female_target as genff','f.general_total_target as genft' ,'f.tsp_male_target as tspfm','f.tsp_female_target as tspff','f.tsp_total_target as tspft','f.scp_male_target as scpfm','f.scp_female_target as scpff','f.scp_total_target as scpft','f.min_male_target as minfm','f.min_female_target as minff','f.min_total_target as minft')->get();
        return json_encode($info);          
    }  

     public function insertpf(Request $req)
    {
        $districtid = $req->input('districtcode');
        $year = $req->input('fiscalyear');
        $tc = $req->input('tc');
        $batch = $req->input('batch');
        $type = $req->input('type');
        $genpm = $req->input('genpm');
        $genpf = $req->input('genpf');
        $genpt = $req->input('genpt');
        $tsppm = $req->input('tsppm');
        $tsppf = $req->input('tsppf');
        $tsppt = $req->input('tsppt');
        $scppm = $req->input('scppm');
        $scppf = $req->input('scppf');
        $scppt = $req->input('scppt');
        $minpm = $req->input('minpm');
        $minpf = $req->input('minpf');
        $minpt = $req->input('minpt');

        $genfm = $req->input('genfm');
        $genff = $req->input('genff');
        $genft = $req->input('genft');
        $tspfm = $req->input('tspfm');
        $tspff = $req->input('tspff');
        $tspft = $req->input('tspft');
        $scpfm = $req->input('scpfm');
        $scpff = $req->input('scpff');
        $scpft = $req->input('scpft');
        $minfm = $req->input('minfm');
        $minff = $req->input('minff');
        $minft = $req->input('minft');
        
        $data1 = array("district_id"=>$districtid,"financial_year"=>$year,"centre_id"=>$tc,"batch_id"=>$batch,"general_male_target"=>$genpm,"general_female_target"=>$genpf,"general_total_target"=>$genpt,"tsp_male_target"=>$tsppm,"tsp_female_target"=>$tsppf,"tsp_total_target"=>$tsppt,"scp_male_target"=>$scppm,"scp_female_target"=>$scppf,"scp_total_target"=>$scppt,"min_male_target"=>$minpm,"min_female_target"=>$minpf,"min_total_target"=>$minpt);
        $data2 = array("district_id"=>$districtid,"financial_year"=>$year,"centre_id"=>$tc,"batch_id"=>$batch,"general_male_target"=>$genfm,"general_female_target"=>$genff,"general_total_target"=>$genft,"tsp_male_target"=>$tspfm,"tsp_female_target"=>$tspff,"tsp_total_target"=>$tspft,"scp_male_target"=>$scpfm,"scp_female_target"=>$scpff,"scp_total_target"=>$scpft,"min_male_target"=>$minfm,"min_female_target"=>$minff,"min_total_target"=>$minft);

        $pt=new physical_target();
        $ft=new financial_target();

        $pt->insertPhysicalTarget($data1);
        $ft->insertFinancialTarget($data2);
        return view('pages.success');

    }
   
}
