<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		$this->call([
			UserSeeder::class,
			LanguageSeeder::class,
			SettingsSeeder::class,
			TypeSeeder::class,
			MenusSeeder::class,
			SlidersSeeder::class,
            SubmenusSeeder::class
		]);
    }
}
