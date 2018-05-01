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

class fetchbatchController extends BaseController
{
    public function fetchbatch(Request $req)
    {
      $tcid = $req->input('trainingcentre');
      // echo "hi".$tc;
       $username=session()->get('username');
        $password=session()->get('password');
        $info = DB::select('SELECT * FROM users WHERE username = ? AND password = ?' , [$username,$password]);
        $tc = DB::select('SELECT * FROM training_centres WHERE district_id in(SELECT district_code FROM districts WHERE district_name=?)',[$info[0]->district]);
        // return view('tcview.pftarget',['district'=>$info[0]->district,'tc'=>$tc,'batchinfo'=>$batch,'centretype'=>'']);
        $batch = DB::select('SELECT * FROM training_batches WHERE centre_id=?' , [$tcid]);
        $tctype = DB::select('SELECT * FROM training_centres WHERE centre_id=?' , [$tcid]);
        return view('tcview.pftarget',['district'=>$info[0]->district,'tc'=>$tc,'batchinfo'=>$batch,'centretype'=>$tctype[0]->centre_type]);
    }
}
