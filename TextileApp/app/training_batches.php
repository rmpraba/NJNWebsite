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
    public function fetchtrainingBatch($centreid){
    	$batch = training_batches::where("centre_id",$centreid)->pluck('batch_name','batch_id');
        return $batch;
    }

    public function editBatchAction($batchid,$action){
        $data = training_batches::where ('batch_id', $batchid)->update(array('action' => $action));
        return $data;
    }
    public function fetchBatchList(){
        $batches = training_batches::all(); 
        return $batches;
    }
}
