<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class financial_target extends Model
{
    protected $fillable=[   
							'district_id',
							'financial_year',
							'centre_id',
							'batch_id',
							'general_male_target',
							'general_female_target',
							'general_target_total',
							'tsp_male_target',
							'tsp_female_target',
							'tsp_target_total',
							'scp_male_target',
							'scp_female_target',
							'scp_target_total',
							'min_male_target',
							'min_female_target',
							'min_target_total',
							'created_by'
                     ];
}
