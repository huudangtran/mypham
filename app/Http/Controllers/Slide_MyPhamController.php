<?php

namespace App\Http\Controllers;

use App\Slide_MyPham;
use App\MyPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use DB;

class Slide_MyPhamController extends Controller
{
	public function getIndex()
	{
		$slide_mypham = Slide_MyPham::join('mypham', 'mypham.id', '=', 'slide_mypham.mypham_id')
		->orderBy('created_at', 'desc')
		->select(DB::raw('Slide_MyPham.*,mypham.tenmypham,mypham.tenmypham_tat'))
		->paginate(10);
		return view('admin.slide_mypham.index', ['slide_mypham' => $slide_mypham]);
	}

	public function getCreate()
	{
		$path = "http://127.0.0.1:8080/mypham/public/upload/images";
		$_SESSION['baseUrl'] = $path;
		
		$mypham = MyPham::all();
		return view('admin.slide_mypham.create', ['mypham' => $mypham]);
	}

	public function postCreate(Request $request)
	{
		$request->validate([
			'mypham_id' => 'required|numeric',
			'hinhanh' => 'required|max:255',
		]);

		$smp = new Slide_MyPham();
		$smp->mypham_id = $request->mypham_id;
		$smp->hinhanh = $request->hinhanh;
		
		$smp->save();

		return redirect('admin/slide_mypham');
	}

	public function getDetails($id)
	{
		//
	}

	public function getEdit($id)
	{
		$slide_mypham = Slide_MyPham::find($id);
		$mypham = MyPham::all();
		return view('admin.slide_mypham.edit', ['slide_mypham' => $slide_mypham, 'mypham' => $mypham]);
	}

	public function postEdit(Request $request)
	{
		$request->validate([
			'mypham_id' => 'required|numeric',
			'hinhanh' => 'required|max:255' . $request->id,
		]);

		$slide_mypham = Slide_MyPham::find($request->id);
		$slide_mypham->mypham_id = $request->mypham_id;
		$slide_mypham->hinhanh = $request->hinhanh;
		$slide_mypham->updated_at = Carbon::now();

		$slide_mypham->save();

		return redirect('admin/slide_mypham');
	}

	public function getDelete($id)
	{
		//
	}

	public function postDelete(Request $request)
	{
		//
	}

}
