<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function getIndex()
	{
		$users = User::paginate(10);
		return view('admin.users.index', ['users' => $users]);
	}
	public function getIndexClient()
	{
		$users = User::where('id','Auth::user()->id')->first();
		return view('taikhoan.index', ['users' => $users]);
	}
	public function getCreate()
	{
		
		return view('admin.users.create');
	}
	
	public function postCreate(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:100',
			'username' => 'required|string|max:100|unique:users',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|min:6|confirmed',
			'privilege' => 'required',
		]);
		
		$user = new User();
		$user->name = $request->name;
		$user->username = $request->username;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->privilege = $request->privilege;
		$user->save();
		
		return redirect('admin/users');
	}
	
	public function getEdit($id)
	{
		$user = User::find($id);
		return view('admin.users.edit', ['user' => $user]);
	}
	
	public function postEdit(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:100',
			'username' => 'required|string|max:100|unique:users,username,' . $request->id,
			'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
			'password' => 'required|min:6|confirmed',
			'privilege' => 'required',
		]);
		
		$user = User::find($request->id);
		$user->name = $request->name;
		$user->username = $request->username;
		$user->email = $request->email;
		$user->privilege = $request->privilege;
		$user->updated_at = Carbon::now();
		if(!empty($request->password)) $user->password = Hash::make($request->password);
		$user->save();
		
		return redirect('admin/users');
	}
	
	public function getDelete($id)
	{
		$user = User::find($id);
		return view('admin.users.delete', ['user' => $user]);
	}
	
	public function postDelete(Request $request)
	{
		$user = User::find($request->id);
		$user->delete();
		
		return redirect('admin/users');
	}
}
