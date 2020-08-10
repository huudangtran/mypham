<?php

namespace App\Http\Controllers;

use App\MyPham;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use DB;

class CommentController extends Controller
{
	public function getIndex()
	{
		$comments=DB::table('comments')->join('users', 'users.id', '=', 'comments.users_id')
		->join('mypham', 'mypham.id', '=', 'comments.mypham_id')
		->select(DB::raw('comments.*,users.name,mypham.tenmypham'))
		->orderBy('created_at', 'desc')
		->paginate(10);
		
		return view('admin.comments.index', ['comments' => $comments]);
	}
	
	public function getCreate()
	{
		//$mypham = MyPham::all();
		//return view('admin.comments.create', ['mypham' => $mypham]);
	}
	
	public function postCreate(Request $request)
	{
		
		$request->validate([
			'comment_content' => 'required|min:10',
		]);
		
		$c = new Comment();
		$c->user_id = $request->user_id;
		$c->mypham_id = $request->mypham_id;
		$c->comment_content = $request->comment_content;
		$c->save();
		
		return back();
	}
	
	public function getDetails($id)
	{
		//
	}
	
	public function getEdit($id)
	{
		//
	}
	
	public function postEdit(Request $request, $id)
	{
		//
	}
	
	public function getDelete($id)
	{
		//
	}
	
	public function postDelete(Request $request, $id)
	{
		//
	}
	
	public function getCommentStatus($id)
	{
		$mp = MyPham::find($id);
		$mp->comment_status = 1 - $post->comment_status;
		$mp->save();
		
		return redirect('admin/mypham');
	}
}
