<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
	protected $table = 'khachhang';
	
	public function DatHang()
	{
		return $this->hasMany('App\DatHang');
	}
	
	public function User()
	{
		return $this->belongsTo('App\User','user_id');
	}
}
