<?php

class SettingsTableSeeder extends Seeder {

	public function run()
	{
		//Insert User
		$settings = [
			[
				'key' => 'Site.title',
				'value' => 'Inquiri',
				'title' => 'Site Title',
				'description' => '',
				'input_type' => null,
				'editable' => 1,
				'weight' => 1,
				'params' => null,
			],
			[
				'key' => 'Site.tagline',
				'value' => 'A website',
				'title' => 'Site Tagline',
				'description' => '',
				'input_type' => null,
				'editable' => 1,
				'weight' => 2,
				'params' => null,
			],
		];

		DB::table('settings')->insert($settings);
		$this->command->info('Settings table seeded!');
	}

}
