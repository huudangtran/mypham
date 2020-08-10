<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietChuDe extends Model
{
	protected $table = 'chitietchude';

	public function ChuDe()
	{
		return $this->belongsTo('App\ChuDe');
	}
}
