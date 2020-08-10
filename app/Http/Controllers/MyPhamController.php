<?php

namespace App\Http\Controllers;


use App\LoaiMyPham;
use App\ThuongHieu;
use App\MyPham;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;

class MyPhamController extends Controller
{
	public function getIndex()
	{
		$mypham = DB::table('mypham')->join('loaimypham', 'loaimypham.id', '=', 'mypham.loaimypham_id')
		->join('thuonghieu', 'thuonghieu.id', '=', 'mypham.thuonghieu_id')
		->select(DB::raw('mypham.*,loaimypham.tenloaimypham,thuonghieu.tenthuonghieu'))
		->orderBy('created_at', 'desc')
		->paginate(10);
		return view('admin.mypham.index',compact('mypham'));
	}

	public function getCreate()
	{
				
		$loaimypham=LoaiMyPham::all();
		$thuonghieu=ThuongHieu::all();
		$mypham=MyPham::all();
		
		$path = "http://127.0.0.1:8080/mypham/public/upload/images/";
		$_SESSION['baseUrl'] = $path;
		
		return view('admin.mypham.create',compact('loaimypham' , 'mypham','thuonghieu'));
	}

	public function postCreate(Request $request)
	{
		$request->validate([
			'tenmypham' => 'required|string|max:191',
		]);

		$mp = new MyPham();
		$mp->loaimypham_id = $request->loaimypham_id;
		$mp->thuonghieu_id = $request->thuonghieu_id;
		$mp->tenmypham = $request->tenmypham;
		$mp->tenmypham_tat = Str::slug($request->tenloaimypham);
		$mp->sanphammoi = (isset( $request->sanphammoi)) ? 1 : 0;
		$mp->dongia = $request->dongia;
		$mp->giagiam = $request->giagiam;
		$mp->soluong = $request->soluong;
		$mp->hinhanh = $request->hinhanh;
		$mp->mota = $request->mota;
		$mp->thongtinmypham = $request->thongtinmypham;
		$mp->comment_status = (isset( $request->comment_status)) ? 1 : 0;
		
		
		$mp->save();

		return redirect('admin/mypham');
	}

	public function getDetails($id)
	{
		//
	}

	public function getEdit($id)
	{
		$mypham = MyPham::find($id);
		$loaimypham = LoaiMyPham::all();
		$thuonghieu=ThuongHieu::all();
		return view('admin.mypham.edit', ['mypham' => $mypham, 'loaimypham' => $loaimypham, 'thuonghieu' => $thuonghieu]);
	}

	public function postEdit(Request $request)
	{
		$request->validate([
			'tenmypham' => 'required|max:255' . $request->id,
		]);

		$mypham = MyPham::find($request->id);
		$mypham->loaimypham_id = $request->loaimypham_id;		
		$mypham->thuonghieu_id = $request->thuonghieu_id;	
		$mypham->tenmypham = $request->tenmypham;
		$mypham->tenmypham_tat = Str::slug($request->tenmypham);
		$mypham->sanphammoi = (isset( $request->sanphammoi)) ? 1 : 0;
		$mypham->dongia = $request->dongia;
		$mypham->giagiam = $request->giagiam;
		$mypham->soluong = $request->soluong;
		$mypham->hinhanh = $request->hinhanh;
		$mypham->mota = $request->mota;
		$mypham->thongtinmypham = $request->thongtinmypham;
		$mypham->comment_status = (isset( $request->comment_status)) ? 1 : 0;
		$mypham->updated_at = Carbon::now();
		$mypham->save();

		return redirect('admin/mypham');
	}

	public function getDelete($id)
	{
		$mypham = MyPham::find($id);
		return view('admin.mypham.delete', ['mypham' => $mypham]);
	}

	public function postDelete(Request $request)
	{
		$mypham = MyPham::find($request->id);
		$mypham->delete();

		return redirect('admin/mypham');
	}

}
