<?php

namespace App\Http\Controllers;

use App\ChuDe;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ChuDeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function getIndex()
	{
		$chude = ChuDe::paginate(10);
		return view('admin.chude.index', ['chude' => $chude]);
	}
	
	public function getCreate()
	{
		return view('admin.chude.create');
	}
	
	public function postCreate(Request $request)
	{
		$request->validate([
			'tenchude' => 'required|max:255|unique:chude',
		]);
		
		$chude = new ChuDe();
		$chude->tenchude = $request->tenchude;
		$chude->tenchude_tat = Str::slug($request->tenchude);
		$chude->save();
		
		return redirect('admin/chude');
	}
	
	public function getEdit($id)
	{
		$chude = ChuDe::find($id);
		return view('admin.chude.edit', ['chude' => $chude]);
	}
	
	public function postEdit(Request $request)
	{
		$request->validate([
			'tenchude' => 'required|max:255|unique:chude,tenchude,' . $request->id,
		]);
		
		$chude = ChuDe::find($request->id);
		$chude->tenchude = $request->tenchude;
		$chude->tenchude_tat = Str::slug($request->tenchude);
		$chude->updated_at = Carbon::now();
		$chude->save();
		
		return redirect('admin/chude');
	}
	
	public function getDelete($id)
	{
		$chude = ChuDe::find($id);
		return view('admin.chude.delete', ['chude' => $chude]);
	}
	
	public function postDelete(Request $request)
	{
		$chude = ChuDe::find($request->id);
		$chude->delete();
		
		return redirect('admin/chude');
	}
}
