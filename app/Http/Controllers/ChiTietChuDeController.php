<?php

namespace App\Http\Controllers;

use App\ChuDe;
use App\ChiTietChuDe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;

class ChiTietChuDeController extends Controller
{
	public function getIndex()
	{
		$chitietchude = ChiTietChuDe::join('chude', 'chude.id', '=', 'chitietchude.chude_id')
		->orderBy('created_at', 'desc')
		->select(DB::raw('ChiTietChuDe.*,chude.tenchude,chude.tenchude_tat'))
		->paginate(10);
		return view('admin.chitietchude.index', ['chitietchude' => $chitietchude]);
	}

	public function getCreate()
	{
		$chude = ChuDe::all();
		return view('admin.chitietchude.create', ['chude' => $chude]);
	}

	public function postCreate(Request $request)
	{
		$request->validate([
			'chude_id' => 'required|numeric',
			'tenchitietchude' => 'required|max:255',
		]);

		$ctcd = new ChiTietChuDe();
		$ctcd->chude_id = $request->chude_id;
		$ctcd->tenchitietchude = $request->tenchitietchude;
		$ctcd->tenchitietchude_tat = Str::slug($request->tenchitietchude);
		$ctcd->save();

		return redirect('admin/chitietchude');
	}

	public function getDetails($id)
	{
		//
	}

	public function getEdit($id)
	{
		$chitietchude = ChiTietChuDe::find($id);
		$chude = ChuDe::all();
		return view('admin.chitietchude.edit', ['chitietchude' => $chitietchude, 'chude' => $chude]);
	}

	public function postEdit(Request $request)
	{
		$request->validate([
			'chude_id' => 'required|numeric',
			'tenchitietchude' => 'required|max:255' . $request->id,
		]);

		$chitietchude = ChiTietChuDe::find($request->id);
		$chitietchude->chude_id = $request->chude_id;
		$chitietchude->tenchitietchude = $request->tenchitietchude;
		$chitietchude->tenchitietchude_tat = Str::slug($request->tenchitietchude);
		$chitietchude->updated_at = Carbon::now();
		
		$chitietchude->save();

		return redirect('admin/chitietchude');
	}

	public function getDelete($id)
	{
		$chitietchude = ChiTietChuDe::find($id);
		return view('admin.chitietchude.delete', ['chitietchude' => $chitietchude]);
	}

	public function postDelete(Request $request)
	{
		$chitietchude = ChiTietChuDe::find($request->id);
		$chitietchude->delete();

		return redirect('admin/chitietchude');
	}

}
