<?php

namespace App\Http\Controllers;

use App\MyPham;
use App\Mau_MyPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;

class Mau_MyPhamController extends Controller
{
	public function getIndex()
	{
		$mau_mypham = Mau_MyPham::join('mypham', 'mypham.id', '=', 'mau_mypham.mypham_id')
		->orderBy('created_at', 'desc')
		->select(DB::raw('Mau_MyPham.*,mypham.tenmypham,mypham.tenmypham_tat'))
		->paginate(10);
		return view('admin.mau_mypham.index', ['mau_mypham' => $mau_mypham]);
	}

	public function getCreate()
	{
		$mypham = MyPham::all();
		return view('admin.mau_mypham.create', ['mypham' => $mypham]);
	}

	public function postCreate(Request $request)
	{
		$request->validate([
			'mypham_id' => 'required|numeric',
			'mau_mypham' => 'required|max:255',
		]);

		$lmp = new Mau_MyPham();
		$lmp->mypham_id = $request->mypham_id;
		$lmp->mau_mypham = $request->mau_mypham;
		$lmp->mamau = $request->mamau;
		
		$lmp->save();

		return redirect('admin/mau_mypham');
	}

	public function getDetails($id)
	{
		//
	}

	public function getEdit($id)
	{
		$mau_mypham = Mau_MyPham::find($id);
		$mypham = MyPham::all();
		return view('admin.mau_mypham.edit', ['mau_mypham' => $mau_mypham, 'mypham' => $mypham]);
	}

	public function postEdit(Request $request)
	{
		$request->validate([
			'mypham_id' => 'required|numeric',
			'mau_mypham' => 'required|max:255' . $request->id,
		]);

		$mau_mypham = Mau_MyPham::find($request->id);
		$mau_mypham->mypham_id = $request->mypham_id;
		$mau_mypham->mau_mypham = $request->mau_mypham;
		$mau_mypham->mamau = $request->mamau;
		$mau_mypham->updated_at = Carbon::now();
		$mau_mypham->save();

		return redirect('admin/mau_mypham');
	}

	public function getDelete($id)
	{
		$mau_mypham = Mau_MyPham::find($id);
		return view('admin.mau_mypham.delete', ['mau_mypham' => $mau_mypham]);
	}

	public function postDelete(Request $request)
	{
		$mau_mypham = Mau_MyPham::find($request->id);
		$mau_mypham->delete();

		return redirect('admin/mau_mypham');
	}

}
