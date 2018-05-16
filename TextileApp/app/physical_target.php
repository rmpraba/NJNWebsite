<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class physical_target extends Model
{
    protected $fillable=[   
							'district_id',
							'financial_year',
							'centre_id',
							'batch_id',
							'general_male_target',
							'general_female_target',
							'general_total_target',
							'tsp_male_target',
							'tsp_female_target',
							'tsp_total_target',
							'scp_male_target',
							'scp_female_target',
							'scp_total_target',
							'min_male_target',
							'min_female_target',
							'min_total_target',
							'created_by'
                     ];
    public function insertPhysicalTarget($array){
    	$target = physical_target::create( $array );        
        return $target;
    } 

    public function approvePhyTarget($array){
    	$target = physical_target::where('batch_id', $array['vbatch'])
    								->where('financial_year', $array['vfiscalyear'])
    								->where('centre_id', $array['vtc'])
    								->update(array('status' => $array['status']));
		return $target;
    } 
    
}
