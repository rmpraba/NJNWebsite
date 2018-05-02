<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\batches;

class batchcreateController extends Controller
{
    public function batch()
    {
    	return view('tcview.batchcreate');
    }
    public function batchinsert(Request $obj)
    {
    	$bat =new batches;
    	$bat->batch_name=$obj->batchname;
    	$bat->training_type=$obj->trainingtype;
    	$bat->no_of_stud=$obj->noofstud;
    	$bat->start_date=$obj->startdate;
    	$bat->end_date=$obj->enddate;
    	$bat->save();
    	if ($bat->save()) {
    		echo "inserted successfully";
    	}
    	else
    	{
    		echo"insertion failed";
    	}
    }
}
