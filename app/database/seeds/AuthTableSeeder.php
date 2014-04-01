<?php

class AuthTableSeeder extends Seeder {

	public function run()
	{
		// Insert User
		$users = array(
			'username' => 'admin',
			'email' => 'admin@admin.com',
			'slug' => 'admin',
			'password' => Hash::make('password'),
			'confirmation_code' => uniqid(),
			'confirmed' => 1,
		);

		DB::table('users')->insert($users);
		$this->command->info('User table seeded!');

		// Insert Role
		$roles = [
			['name' => 'Super Admin'],
			['name' => 'Admin'],
		];

		DB::table('roles')->insert($roles);
		$this->command->info('Role table seeded!');

		// Insert relationship
		$admin = User::where('username', '=', 'admin')->first();
		$roleId = Role::where('name', '=', 'Super Admin')->first()->id;
		$admin->attachRole($roleId);
		$roleId = Role::where('name', '=', 'Admin')->first()->id;
		$admin->attachRole($roleId);

		$this->command->info('Added relationships!');

		// Insert Default Category
		$roles = [
			[
				'name' => 'Uncategorized',
				'slug' => 'uncategorized',
				'description' => '',
			],
		];

		DB::table('roles')->insert($roles);
		$this->command->info('Role table seeded!');
	}

}
