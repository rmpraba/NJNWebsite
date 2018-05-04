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

class batchcreateController extends Controller
{
    public $district;
    public $batch_id;
    public $batch_prefix;
    public function batch()
    {        
    	return view('tcview.batchcreate');
    }
    public function batchinsert(Request $obj)
    {
        $username=session()->get('username');
        $password=session()->get('password');
        // echo $username."----",$password;
        $info = DB::select('SELECT * FROM users WHERE username = ? AND password = ?' , [$username,$password]);
        $district=$info[0]->district;
        $centreid=$info[0]->centre_id;
        $districtinfo = DB::select('SELECT * FROM districts WHERE district_name=?' , [$district]);
        $district_code= $districtinfo[0]->district_code;
        $seqinfo = DB::select('SELECT * FROM sequences');       
        $batch_id=$seqinfo[0]->batch_id;
        if($batch_id<10)
            $batch_id="0".$batch_id;
        $batch_prefix=$seqinfo[0]->batch_prefix;
        $batch_code=$district_code.$batch_prefix.$batch_id;
        $newbatch_id=$batch_id+1;
        DB::update('update sequences set batch_id = ?',[$newbatch_id]);
        // echo "Your batch id is here...".$district.$batch_prefix.$batch_id;
    	$bat =new batches;
        $bat->created_by=$username;
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
    		// echo "inserted successfully";
            return view('pages.success');
    	}
    	else
    	{
    		echo"insertion failed";
    	}
    }
    public function editbatchlist($batchid)
    {  
        // echo $batchid;
        $batchinfo = DB::select('SELECT * FROM batches WHERE batch_id= ? ',[$batchid]);
        $start = strtotime($batchinfo[0]->start_date);
        $startdate = date('Y-m-d',$start);
        $end = strtotime($batchinfo[0]->end_date);
        $enddate = date('Y-m-d',$end);
        // echo $newformat;
        return view('tcview.editbatchlist',compact('batchinfo'),['startdate'=>$startdate,'enddate'=>$enddate]);
    }
     public function batchupdate(Request $req)
    { 
         // DB::update('update batches set batch_name=?,training_type=?,start_date=?,end_date=?,no_of_stud=? WHERE batch_id=?',[$req->input('batchname'),$req->input('trainingtype'),$req->input('startdate'),$req->input('enddate'),$req->input('noofstud'),$req->input('batchid')]);
        // $batch = batches::where ('batch_id', $req->input('batchid')); 
        $new_batch_data = array('batch_name'=>$req->input('batchname'),'training_type'=>$req->input('trainingtype'),'start_date'=>$req->input('startdate'),'end_date'=>$req->input('enddate'),'no_of_stud'=>$req->input('noofstud'));
        $batch = batches::where ('batch_id', $req->input('batchid'))->update($new_batch_data);
        return view('pages.success');  
    }
     public function deletebatchlist($batchid)
    { 
         // DB::delete('delete from batches WHERE batch_id=?',[$batchid]);
         // return view('pages.success');  
        $tc = batches::where('batch_id', $batchid);
        $tc->delete();
        return view('pages.success'); 
    }
}
