<?php namespace Services\Validators;

class Permission extends Validator {

	public static $rules = [
		'name' => 'required',
		'method' => 'required|unique_record:name'
	];

	public $messages = [
		'unique_record' => 'This record already exists!',
	];

	public function __construct() {
		parent::__construct();
		\Validator::extend('unique_record', 'Services\Validators\Permission@unique_record');
	}

	public function unique_record($field, $value, $params)
    {
    	$name = $this->attributes['name'];
    	$method = $this->attributes['method'];
    	$results = $users = \DB::table('permissions')->where('method', '=', $method)->where('name', '=', $name)->count();
    	if ($results) {
    		return false;
    	}
    	return true;
    }
}

