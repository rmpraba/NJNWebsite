<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class training_centres extends Model
{
    protected $fillable=[   'name',
							'centre_id',
							'centre_name',
							'district_id',
							'upload_pic',
							'street',
							'district',
							'state',
							'pin_code',
							'email',
							'mobile_number',
							'landline',
							'website_id',
							'pan_card',
							'pan_card_image',
							'gst',
							'gst_image',
							'training_start',
							'training_end',
							'adhar_card',
							'adhar_card_image',
							'centre_type',
							'training',
							'centre_status'

                     ];
    public function fetchTcList(){
    	$tc = training_centres::all(); 
        return $tc;
    }
    public function deleteTc($centreid){
    	$tc = training_centres::where('centre_id', $centreid);        
        return $tc->delete();
    }
    public function fetchtcforList(){
    	$tc = training_centres::pluck('centre_name','centre_id');        
        return $tc;
    }

}
