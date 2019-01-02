<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $fillable = ['title', 'body'];

	public finction user() {
		return $this->belongTo(User::class);
	}
}
