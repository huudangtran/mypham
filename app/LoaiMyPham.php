<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiMyPham extends Model
{
	protected $table = 'loaimypham';
	
	public function ChiTietChuDe()
	{
		return $this->belongsTo('App\ChiTietChuDe');
	}
	
	
	public function MyPham()
	{
		return $this->hasMany('App\MyPham');
	}
}
