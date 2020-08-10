<?php

namespace App\Http\Controllers;

use App\ThuongHieu;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ThuongHieuController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function getIndex()
	{
		$thuonghieu = ThuongHieu::paginate(10);
		return view('admin.thuonghieu.index', ['thuonghieu' => $thuonghieu]);
	}
	
	public function getCreate()
	{
		$path = "http://127.0.0.1:8080/mypham/public/upload/images/";
		$_SESSION['baseUrl'] = $path;
		
		return view('admin.thuonghieu.create');
	}
	
	public function postCreate(Request $request)
	{
		$request->validate([
			'tenthuonghieu' => 'required|max:255|unique:thuonghieu',
		]);
		
		$thuonghieu = new ThuongHieu();
		$thuonghieu->tenthuonghieu = $request->tenthuonghieu;
		$thuonghieu->hinhanh = $request->hinhanh;
		$thuonghieu->tenthuonghieu_tat = Str::slug($request->tenthuonghieu);
		$thuonghieu->save();
		
		return redirect('admin/thuonghieu');
	}
	
	public function getEdit($id)
	{
		$thuonghieu = ThuongHieu::find($id);
		return view('admin.thuonghieu.edit', ['thuonghieu' => $thuonghieu]);
	}
	
	public function postEdit(Request $request)
	{
		$request->validate([
			'tenthuonghieu' => 'required|max:255|unique:thuonghieu,tenthuonghieu,' . $request->id,
		]);
		
		$thuonghieu = ThuongHieu::find($request->id);
		$thuonghieu->tenthuonghieu = $request->tenthuonghieu;
		$thuonghieu->hinhanh = $request->hinhanh;
		$thuonghieu->tenthuonghieu_tat = Str::slug($request->tenthuonghieu);
		$thuonghieu->updated_at = Carbon::now();
		$thuonghieu->save();
		
		return redirect('admin/thuonghieu');
	}
	
	public function getDelete($id)
	{
		$thuonghieu = ThuongHieu::find($id);
		return view('admin.thuonghieu.delete', ['thuonghieu' => $thuonghieu]);
	}
	
	public function postDelete(Request $request)
	{
		$thuonghieu = ThuongHieu::find($request->id);
		$thuonghieu->delete();
		
		return redirect('admin/thuonghieu');
	}
}
