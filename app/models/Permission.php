<?php

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{

	public static $rules = [];

	protected $fillable = ['name', 'method'];

}
