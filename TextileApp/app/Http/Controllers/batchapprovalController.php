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

class batchapprovalController extends Controller
{
    public function fetchbatchlistview(Request $obj)
    {
     $batchinfo = DB::select('SELECT * FROM batches');  
      return view('tcview.viewbatchlist')->with(array('batchinfo'=>$batchinfo));
    }
    public function fetchbatchlist(Request $obj)
    {
     $batchinfo = DB::select('SELECT * FROM batches WHERE status="Pending"');  
      return view('tdview.viewbatch')->with(array('batchinfo'=>$batchinfo));
    }
    public function approveBatch($id)
    {
        DB::update('update batches set status="Approved" WHERE batch_id=?',[$id]); 
        $batchinfo = DB::select('SELECT * FROM batches WHERE batch_id= ? ',[$id]);
        $data1 = array("centre_id"=>$batchinfo[0]->centre_id,"batch_id"=>$batchinfo[0]->batch_id,"batch_name"=>$batchinfo[0]->batch_name,"status"=>$batchinfo[0]->status,"created_by"=>$batchinfo[0]->created_by,"batch_type"=>$batchinfo[0]->training_type);
        DB::table('training_batches')->insert(array($data1));  
        return view('pages.success');
    }
    public function rejectBatch($id)
    { 
        DB::update('update batches set status="Rejected" WHERE batch_id=?',[$id]); 
        return view('pages.success');  
    }
}
