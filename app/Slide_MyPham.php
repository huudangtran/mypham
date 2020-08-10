<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide_MyPham extends Model
{
	protected $table = 'slide_mypham';
	
	public function MyPham()
	{
		return $this->belongsTo('App\MyPham');
	}
}
