<?php

use Illuminate\Database\Seeder;
	use Illuminate\Support\Facades\DB;
class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('languages')->insert([
		   [
			   'languages' => 'Türkçe',
			   'lang' => 'tr',
			   'state' => 1
		   ],
		   [
			   'languages' => 'İngilizce',
			   'lang' => 'en',
			   'state' => 1
		   ]

	   ]);
    }
}
