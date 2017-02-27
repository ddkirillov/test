<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
	protected $guarded = [];
	
	public static function search ($needle) {
		return static::where('name', 'LIKE', '%' . $needle . '%')
			->orWhere('surname', 'LIKE', '%' . $needle . '%')
			->orWhere('company', 'LIKE', '%' . $needle . '%')
			->orWhere('position', 'LIKE', '%' . $needle . '%')
			->orWhere('email', 'LIKE', '%' . $needle . '%')
			->orWhere('phone', 'LIKE', '%' . $needle . '%')
			->get();
	}
}
