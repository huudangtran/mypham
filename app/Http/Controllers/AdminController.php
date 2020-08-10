<?php

namespace App\Http\Controllers;

use App\MyPham;	
use App\Comment;
use App\LoaiMyPham;	
use App\ThuongHieu;
use App\ChuDe;	
use App\ChiTietChuDe;
use App\Size_MyPham;	
use App\Mau_MyPham;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function getIndex()
	{
		return view('admin.index');
	}
}
