<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class users extends Authenticatable
{
	use Notifiable;
      protected $fillable=[   
							'district',
							'username',
							'password',
							'centre_id'
							];
	protected $hidden = [
        'password', 'remember_token',
    ];
    public function fetchUserInfo($username,$password){
    	$district = users::where('username', $username)->where('password', $password)->get();     
        return $district;
    }
    public function fetchUserId($username){
    	$user = users::where('username', $username)->get();     
        return $user;
    }
}
