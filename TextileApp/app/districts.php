<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class districts extends Model
{
	protected $fillable=[   
							'district_name',
							'district_code',
							'division'
                     ];
}
