<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AccountController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	
	public function getIndexClient()
	{
		$users = User::where('id','Auth::user()->id')->first();
		return view('taikhoan.index', ['users' => $users]);
	}
	
	
	
	
	public function getEdit($id)
	{
		$user = User::find($id);
		return view('taikhoan.edit', ['user' => $user]);
	}
	
	public function postEdit(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:100',
			'username' => 'required|string|max:100|unique:users,username,' . $request->id,
			'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
			'password' => 'required|min:6|confirmed',
			
		]);
		
		$user = User::find($request->id);
		$user->name = $request->name;
		$user->username = $request->username;
		$user->email = $request->email;
		
		$user->updated_at = Carbon::now();
		if(!empty($request->password)) $user->password = Hash::make($request->password);
		$user->save();
		
		return redirect('taikhoan');
	}
	
	
	
	
}
