<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class training_centre extends Model
{
    protected $fillable=[   'name',
							'centre_id',
							'centre_name',
							'district_id',
							'upload_pic',
							'bulding_name',
							'road_name',
							'pin_code',
							'email',
							'mobile_number',
							'landline',
							'website_id',
							'pan_card_image',
							'gst',
							'gst_image',
							'training_start',
							'adhar_card',
							'adhar_card_image',
							'centre_type',
							'training',
							'centre_status'

                     ];
}
