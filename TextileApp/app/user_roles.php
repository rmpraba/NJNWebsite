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
}
