<?php

namespace App\Http\Controllers;

use App\KhachHang;
use App\DatHang;
use App\DatHang_ChiTiet;
use App\MyPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;

class DonHangController extends Controller
{
	public function getIndex()
	{
		
		$donhang = DatHang_ChiTiet::join('dathang', 'dathang.id', '=', 'dathang_chitiet.dathang_id')
		->join('khachhang', 'khachhang.id', '=', 'dathang.khachhang_id')
		->join('mypham', 'mypham.id', '=', 'dathang_chitiet.mypham_id')
		->join('thuonghieu', 'thuonghieu.id', '=', 'mypham.thuonghieu_id')
		->join('loaimypham', 'loaimypham.id', '=', 'mypham.loaimypham_id')
		->orderBy('created_at', 'desc')
		->select(DB::raw('DatHang_ChiTiet.*,
		khachhang.tenkhachhang,khachhang.user_id,
		dathang.diachi_giaohang,dathang.method_vanchuyen,dathang.method_thanhtoan,dathang.tinhtrang,dathang.tongtien,
		mypham.tenmypham,mypham.hinhanh,mypham.thongtinmypham,
		thuonghieu.tenthuonghieu,
		loaimypham.tenloaimypham'))
		->paginate(1);
		//dd($donhang);
		return view('page.dathang.index', ['donhang' => $donhang]);
	}
	
	
}
