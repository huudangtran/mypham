<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyPham extends Model
{
	protected $table = 'mypham';
	
	
	public function LoaiMyPham()
	{
		return $this->belongsTo('App\LoaiMyPham');
	}
	
	public function ThuongHieu()
	{
		return $this->belongsTo('App\ThuongHieu','thuonghieu_id');
	}
	

	public function Size_MyPham()
	{
		return $this->hasMany('App\Size_MyPham');
	}
	
	public function Mau_MyPham()
	{
		return $this->hasMany('App\Mau_MyPham');
	}
	
	public function Comment()
	{
		return $this->hasMany('App\Comment','mypham_id','id');
	}
	
	public function DatHang_ChiTiet()
	{
		return $this->hasMany('App\DatHang_ChiTiet');
	}
}
