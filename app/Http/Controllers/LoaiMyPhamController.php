<?php

namespace App\Http\Controllers;

use App\ChiTietChuDe;
use App\LoaiMyPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;

class LoaiMyPhamController extends Controller
{
	public function getIndex()
	{
		$loaimypham = LoaiMyPham::join('chitietchude', 'chitietchude.id', '=', 'loaimypham.chitietchude_id')
		->orderBy('created_at', 'desc')
		->select(DB::raw('LoaiMyPham.*,chitietchude.tenchitietchude,chitietchude.tenchitietchude_tat'))
		->paginate(10);
		return view('admin.loaimypham.index', ['loaimypham' => $loaimypham]);
	}

	public function getCreate()
	{
		$chitietchude = ChiTietChuDe::all();
		return view('admin.loaimypham.create', ['chitietchude' => $chitietchude]);
	}

	public function postCreate(Request $request)
	{
		$request->validate([
			'chitietchude_id' => 'required|numeric',
			'tenloaimypham' => 'required|max:255',
		]);

		$lmp = new LoaiMyPham();
		$lmp->chitietchude_id = $request->chitietchude_id;
		$lmp->tenloaimypham = $request->tenloaimypham;
		$lmp->tenloaimypham_tat = Str::slug($request->tenloaimypham);
		$lmp->save();

		return redirect('admin/loaimypham');
	}

	public function getDetails($id)
	{
		//
	}

	public function getEdit($id)
	{
		$loaimypham = LoaiMyPham::find($id);
		$chitietchude = ChiTietChuDe::all();
		return view('admin.loaimypham.edit', ['loaimypham' => $loaimypham, 'chitietchude' => $chitietchude]);
	}

	public function postEdit(Request $request)
	{
		$request->validate([
			'chitietchude_id' => 'required|numeric',
			'tenloaimypham' => 'required|max:255' . $request->id,
		]);

		$loaimypham = LoaiMyPham::find($request->id);
		$loaimypham->chitietchude_id = $request->chitietchude_id;
		$loaimypham->tenloaimypham = $request->tenloaimypham;
		$loaimypham->tenloaimypham_tat = Str::slug($request->tenloaimypham);
		$loaimypham->updated_at = Carbon::now();
		$loaimypham->save();

		return redirect('admin/loaimypham');
	}

	public function getDelete($id)
	{
		$loaimypham = LoaiMyPham::find($id);
		return view('admin.loaimypham.delete', ['loaimypham' => $loaimypham]);
	}

	public function postDelete(Request $request)
	{
		$loaimypham = LoaiMyPham::find($request->id);
		$loaimypham->delete();

		return redirect('admin/loaimypham');
	}

}
