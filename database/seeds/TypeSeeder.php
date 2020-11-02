<?php

use Illuminate\Database\Seeder;
	use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('types')->insert([
		   [
		   	'name' => 'Hakkımızda Sayfası',
		   'value' => 'hs',
		   'state' => 1
			],
		   [
			   'name' => 'İletişim Sayfası',
			   'value' => 'is',
			   'state' => 1
		   ],
		   [
			   'name' => 'Galeri Sayfası',
			   'value' => 'gs',
			   'state' => 0
		   ],
		   [
			   'name' => 'Firma Sayfası',
			   'value' => 'fs',
			   'state' => 0
		   ]

	   ]);
    }
}
