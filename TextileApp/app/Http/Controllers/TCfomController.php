<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\training_centres;

use DB;
use Session;

class TCfomController extends Controller
{
    public function tcform(Request $ob)
    {
    			return view('tdview.training_center_form');	
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
