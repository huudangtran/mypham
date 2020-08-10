<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatHang extends Model
{
	protected $table = 'dathang';
	
	public function KhachHang()
	{
		return $this->belongsTo('App\KhachHang', 'khachhang_id');
	}
	
	public function DatHang_ChiTiet()
	{
		return $this->hasMany('App\DatHang_ChiTiet');
	}
}
