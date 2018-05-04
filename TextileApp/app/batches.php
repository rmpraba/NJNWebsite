<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class batches extends Model
{
    protected $fillable=[
    			'batch_id',
    			'batch_name',
				'training_type',
				'no_of_stud',
				'start_date',
				'end_date',
				'status',
				'district_id',
				'created_by',
				'centre_id'
    			];
    public function deleteBatch($batchid){
    	$batch = batches::where('batch_id', $batchid);        
        return $batch->delete();
    }
    public function updateBatch($new_batch_data,$batchid){
    	$batch = batches::where ('batch_id', $batchid)->update($new_batch_data);
    }
}
