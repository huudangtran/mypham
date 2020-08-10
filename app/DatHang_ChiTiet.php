<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatHang_ChiTiet extends Model
{
	protected $table = 'dathang_chitiet';
	
	public function MyPham()
	{
		return $this->belongsTo('App\MyPham','mypham_id');
	}
	
	public function DatHang()
	{
		return $this->belongsTo('App\DatHang','dathang_id');
	}
	

}
