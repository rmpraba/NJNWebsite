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
							'batch_academic_year'
                     ];
    public function insertTrainingBatch($array){
    	$batch = training_batches::create( $array );        
        return $batch;
    } 
    public function fetchtrainingBatch($centreid){
    	$batch = training_batches::where("centre_id",$centreid)->pluck('batch_name','batch_id');
        return $batch;
    }
    public function fetchtrainingType($centreid){
        $batch = training_batches::where("centre_id",$centreid)->pluck('batch_type','batch_type');
        return $batch;
    }
    public function fetchTypeBatch($centreid,$type){
        $batch = training_batches::where("centre_id",$centreid)->where("batch_type",$type)->pluck('batch_name','batch_id');
        return $batch;
    }
}
