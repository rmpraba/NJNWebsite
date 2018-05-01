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
// use Illuminate\Support\Facades\DB;

class pftargetfetchController extends BaseController
{
    public function pftargetfetch(Request $req)
    {
        // $username=session()->get('username');
        // $password=session()->get('password');
        // $info = DB::select('SELECT * FROM users WHERE username = ? AND password = ?' , [$username,$password]);
        // $tc = DB::select('SELECT * FROM training_centre WHERE district_id in(SELECT district_code FROM districts WHERE district_name=?)',[$info[0]->district]);
        // return view('tcview.pftarget',['district'=>$info[0]->district,'tc'=>$tc]);
      $tcs = DB::table("training_centres")->pluck("centre_name","centre_id");
        return view('tcview.pftarget',compact('tcs'));
    }
    public function getBatchList($id)
    {
      // echo "hi".$id;
        $batches = DB::table("training_batches")
                    ->where("centre_id",$id)
                    ->pluck("batch_name","batch_id");
        return json_encode($batches);
    } 
    public function getBatchInfo($id)
    {
      // echo "hi".$id;
        $info = DB::select('SELECT * FROM training_batches b join training_centres t on(b.centre_id=t.centre_id) join batches ba on(b.batch_id=ba.id) join districts d on(d.district_code=t.district_id) WHERE b.id=?' , [$id]);
        // echo "halo".$info[0]->batch_type;
        // $batchinfo = DB::table("batches")
        //             ->where("id",$id)
        //             ->pluck("start_date","batch_type");
        return json_encode($info);          
        // return json_encode(['timing'=>$batchinfo[0]->start_date,'type'=>$batchinfo[0]->batch_type]);
    }  
        // $batch = DB::select('SELECT * FROM training_batches');
        // // $tc = DB::select('SELECT * FROM training_centre');
        // return view('tcview.pftarget',['district'=>$info[0]->district,'tc'=>$tc,'batchinfo'=>$batch,'centretype'=>'']);
    // public function getYearList()
    // {
        // $years = DB::table("academicyear")->get();
        // $years = DB::table("academicyear")->pluck("academic_year","id");
        // return view('tcview.pftarget',compact('years'));
    // }
    // public function getTcList(Request $request)
    // {
    //     $tcs = DB::table("training_centre")
    //                 ->where("academic_year",$request->year)
    //                 ->lists("centre_name","centre_id");
    //     return response()->json($tcs);
    // }
    // public function getBatchList(Request $request)
    // {
    //     $batches = DB::table("training_batches")
    //                 ->where("centre_id",$request->tc)
    //                 ->lists("batch_type","batch_id");
    //     return response()->json($batches);
    // }
    // }
}
