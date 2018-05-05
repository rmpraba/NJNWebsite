<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
      protected $fillable=[   
							'district',
							'username',
							'password',
							'centre_id'
							];
    public function fetchUserInfo($username,$password){
    	$district = users::where('username', $username)->where('password', $password)->get();      
        return $district;
    }
}
