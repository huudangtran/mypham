<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mau_MyPham extends Model
{
	protected $table = 'mau_mypham';
	
	public function MyPham()
	{
		return $this->belongsTo('App\MyPham');
	}
}
