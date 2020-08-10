<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $table = 'comments';
	
	public function MyPham()
	{
		return $this->belongsTo('App\MyPham','mypham_id');
	}
	
	public function User()
	{
		return $this->belongsTo('App\User','user_id');
	}
}
