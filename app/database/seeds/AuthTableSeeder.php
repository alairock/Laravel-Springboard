<?php

class AuthTableSeeder extends Seeder {

	public function run()
	{
		//Insert User
		$users = array(
			'username' => 'admin',
			'email' => 'admin@admin.com',
			'password' => Hash::make('password'),
			'confirmation_code' => uniqid(),
			'confirmed' => 1,
		);

		DB::table('users')->insert($users);
		$this->command->info('User table seeded!');

		//Insert Role
		$roles = array(
			'name' => 'Super Admin',
		);

		DB::table('roles')->insert($roles);
		$this->command->info('Role table seeded!');

		// Insert relationship
		$admin = User::where('username', '=', 'admin')->first();
		$roleId = Role::where('name', '=', 'Super Admin')->first()->id;
		$admin->attachRole($roleId);
	}

}
