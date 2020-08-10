<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThuongHieu extends Model
{
	protected $table = 'thuonghieu';
	
	public function MyPham_ThuongHieu()
	{
		return $this->hasMany('App\MyPham_ThuongHieu');
	}
}
