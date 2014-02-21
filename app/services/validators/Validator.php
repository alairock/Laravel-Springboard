<?php namespace Services\Validators;

abstract class Validator {

	protected $attributes;

	public $errors;

	public $messages;

	public function __construct($attributes = null) {
		$this->attributes = $attributes ?: \Input::all();
	}

	public function passes() {
		$validation = \Validator::make($this->attributes, static::$rules, $this->messages);
		if ($validation->passes()) return true;

		$this->errors = $validation->messages();

		return false;
	}

	public function errors() {
		return $this->errors;
	}
}
