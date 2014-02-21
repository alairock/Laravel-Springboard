<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Post extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required'
	);
}
