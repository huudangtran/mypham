<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size_MyPham extends Model
{
	protected $table = 'size_mypham';
	
	public function MyPham()
	{
		return $this->belongsTo('App\MyPham');
	}
}
