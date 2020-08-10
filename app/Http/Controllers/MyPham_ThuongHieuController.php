<?php

namespace App\Http\Controllers;



use App\ThuongHieu;
use App\MyPham;
use App\MyPham_ThuongHieu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;

class MyPham_ThuongHieuController extends Controller
{
	public function getIndex()
	{
		$mypham_thuonghieu = DB::table('mypham_thuonghieu')->join('thuonghieu', 'thuonghieu.id', '=', 'mypham_thuonghieu.thuonghieu_id')
		->join('mypham', 'mypham.id', '=', 'mypham_thuonghieu.mypham_id')
		->select(DB::raw('mypham_thuonghieu.*,thuonghieu.tenthuonghieu, mypham.tenmypham'))
		->orderBy('created_at', 'desc')
		->get();
		return view('admin.mypham_thuonghieu.index',compact('mypham_thuonghieu'));
	}

	public function getCreate()
	{
		
		
		$thuonghieu=ThuongHieu::all();
		$mypham=MyPham::all();
		
		$path = "http://127.0.0.1:8080/mypham_thuonghieu/public/upload/images/";
		$_SESSION['baseUrl'] = $path;
		
		return view('admin.mypham_thuonghieu.create',compact('thuonghieu' , 'mypham'));
	}

	public function postCreate(Request $request)
	{
		$request->validate([			
			'mypham_id' => 'required|numeric',
			
		]);

		$mp = new MyPham_ThuongHieu();		
		$mp->thuonghieu_id = $request->thuonghieu_id;
		$mp->mypham_id = $request->mypham_id;		
		
		$mp->save();

		return redirect('admin/mypham_thuonghieu');
	}

	public function getDetails($id)
	{
		//
	}

	public function getEdit($id)
	{
		$mypham_thuonghieu = MyPham_ThuongHieu::find($id);
		$thuonghieu = ThuongHieu::all();
		$mypham=MyPham::all();
		return view('admin.mypham_thuonghieu.edit', ['mypham_thuonghieu' => $mypham_thuonghieu, 'thuonghieu' => $thuonghieu, 'mypham' => $mypham ]);
	}

	public function postEdit(Request $request)
	{
		$request->validate([
			'mypham_id' => 'required|numeric',
			
		]);

		$mypham_thuonghieu = MyPham_ThuongHieu::find($request->id);
		$mypham_thuonghieu->thuonghieu_id = $request->thuonghieu_id;		
		$mypham_thuonghieu->mypham_id = $request->mypham_id;
		$mypham_thuonghieu->updated_at = Carbon::now();
		$mypham_thuonghieu->save();

		return redirect('admin/mypham_thuonghieu');
	}

	public function getDelete($id)
	{
		$mypham_thuonghieu = MyPham_ThuongHieu::find($id);
		$mypham=MyPham::all();
		return view('admin.mypham_thuonghieu.delete', ['mypham_thuonghieu' => $mypham_thuonghieu,'mypham' => $mypham]);
	}

	public function postDelete(Request $request)
	{
		$mypham_thuonghieu = MyPham_ThuongHieu::find($request->id);
		$mypham_thuonghieu->delete();

		return redirect('admin/mypham_thuonghieu');
	}

}
