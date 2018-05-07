<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_roles extends Model
{
    protected $fillable=[   
							'role_id',
							'user_id',
							'role_type',
							'status'
							];
	public function fetchRole($userid){
    	$user = user_roles::where('user_id', $userid)->get();     
        return $user;
    }
}
