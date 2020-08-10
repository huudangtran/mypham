<?php

namespace App\Http\Controllers;

use App\Size_MyPham;
use App\MyPham;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;

class Size_MyPhamController extends Controller
{
	public function getIndex()
	{
		$size_mypham = Size_MyPham::join('mypham', 'mypham.id', '=', 'size_mypham.mypham_id')
		->orderBy('created_at', 'desc')
		->select(DB::raw('Size_MyPham.*,mypham.tenmypham,mypham.tenmypham_tat'))
		->paginate(10);
		return view('admin.size_mypham.index', ['size_mypham' => $size_mypham]);
	}

	public function getCreate()
	{
		$mypham = MyPham::all();
		return view('admin.size_mypham.create', ['mypham' => $mypham]);
	}

	public function postCreate(Request $request)
	{
		$request->validate([
			'mypham_id' => 'required|numeric',
			'size_mypham' => 'required|max:255',
		]);

		$smp = new Size_MyPham();
		$smp->mypham_id = $request->mypham_id;
		$smp->size_mypham = $request->size_mypham;
		$smp->gia = $request->gia;
		$smp->save();

		return redirect('admin/size_mypham');
	}

	public function getDetails($id)
	{
		//
	}

	public function getEdit($id)
	{
		$size_mypham = Size_MyPham::find($id);
		$mypham = MyPham::all();
		return view('admin.size_mypham.edit', ['size_mypham' => $size_mypham, 'mypham' => $mypham]);
	}

	public function postEdit(Request $request)
	{
		$request->validate([
			'mypham_id' => 'required|numeric',
			'size_mypham' => 'required|max:255' . $request->id,
		]);

		$size_mypham = Size_MyPham::find($request->id);
		$size_mypham->mypham_id = $request->mypham_id;
		$size_mypham->size_mypham = $request->size_mypham;
		$size_mypham->gia = $request->gia;
		$size_mypham->updated_at = Carbon::now();

		$size_mypham->save();

		return redirect('admin/size_mypham');
	}

	public function getDelete($id)
	{
		$size_mypham = Size_MyPham::find($id);
		return view('admin.size_mypham.delete', ['size_mypham' => $size_mypham]);
	}

	public function postDelete(Request $request)
	{
		$size_mypham = Size_MyPham::find($request->id);
		$size_mypham->delete();

		return redirect('admin/size_mypham');
	}

}
