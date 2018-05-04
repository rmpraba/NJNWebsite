<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\training_centres;
use DB;
use Session;

class viewtcController extends Controller
{
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
}
