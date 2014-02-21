<?php namespace Services\Filters;

class Filter {

	protected $path;

	protected $whitelist;

	function __construct() {
		$this->path = \Route::getCurrentRoute()->getPath();
		$this->whitelist = \Config::get('whitelist.whitelist');
	}

}
