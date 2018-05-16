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
        if ($action == "Start") 
        {
           $field = "start_date";
           $value = date('Y-m-d H:i:s');
        }
        if ($action == "Completed") 
        {
           $field = "completed_date";
           $value = date('Y-m-d H:i:s');
        }
        if ($action == "Hold") 
        {
           $field = "hold_date";
           $value = date('Y-m-d H:i:s');
        }
        
          
        $data = training_batches::where ('id', $batchid)->update(array('action' => $action,$field => $value));
        return $data;
    }
    public function fetchBatchList(){
        $batches = training_batches::all(); 
        return $batches;
    }

    public function fetchCompletedBatchList(){
        $batches = training_batches::where('action',"Completed")->get();
        return $batches;
    }

    
    public function updateBatchExpense($data){ 
        $success = training_batches::where ('id', $data['id'])->update( $data );
        return $success;
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
