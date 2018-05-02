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
				'created_by'
    			];
}
