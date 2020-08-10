<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyPham_ThuongHieu extends Model
{
	protected $table = 'mypham_thuonghieu';	
	
	
	public function ThuongHieu()
	{
		return $this->belongsTo('App\ThuongHieu');
	}
	
	public function MyPham()
	{
		return $this->belongsTo('App\MyPham');
	}
}
