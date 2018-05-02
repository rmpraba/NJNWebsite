<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\training_centres;

class TCfomController extends Controller
{
    public function tcform(Request $ob)
    {
    			return view('tdview.training_center_form');	
    }
    
    public function insert(Request $req)
    {
    	$training_centre = new training_centres;
    	$training_centre->name=$req->name;
    	$training_centre->centre_id='data';
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
    	$training_centre->centre_status=$req->status;
    	$training_centre->save();
    	if($training_centre->save()){
            return view('pages.success');
    	}
    	else{
    		echo "insertion faild";
    	}
    }

}
