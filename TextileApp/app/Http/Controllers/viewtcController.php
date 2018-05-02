<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class viewtcController extends Controller
{
     public function fetchtclist(Request $obj)
    {
     $tcinfo = DB::select('SELECT * FROM training_centres');  
      return view('tdview.viewtc')->with(array('tcinfo'=>$tcinfo));
    }
}
