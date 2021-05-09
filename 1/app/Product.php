<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
	public function models()
	{
		return $this->hasMany('App\Models');
	}
}
