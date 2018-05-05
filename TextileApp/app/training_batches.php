<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class training_batches extends Model
{
     protected $fillable=[   
							'centre_id',
							'batch_id',
							'status',
							'created_by',
							'batch_type',
							'batch_name',
							'academic_year'
                     ];
    public function insertTrainingBatch($array){
    	$batch = training_batches::create( $array );        
        return $batch;
    } 
}
