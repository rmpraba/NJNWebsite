<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class batch_candidates extends Model
{
          protected $fillable=[   
          					'academic_year',
							'centre_id',
							'batch_id',
							'batch_type',
							'candidate_id'
							];
	public function createbatchCandidate($array){
    	$candidates = batch_candidates::insert($array);     
        return $candidates;
    }	
    public function checkCandidate($id){
    	$candidates = batch_candidates::where('candidate_id',$id)->get();     
        return $candidates;
    }
    public function batchCandidate($id){
        $candidates = batch_candidates::where('batch_id',$id)->get();     
        return $candidates;
    }
    public function deletebatchCandidate($id){
    	$candidates = batch_candidates::where('candidate_id',$id)->delete();     
        return $candidates;
    }	
    				
}
