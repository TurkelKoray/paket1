<?php

use Illuminate\Database\Seeder;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
		   'name' => 'Firma',
		   'email' => 'firma@domain.com',
		   'password' => Hash::make('123456'),
		   'remember_token' => Str::random(100),
		   'img' => '',
		   'yetki' => 10,
		   'facebook' => '#',
		   'twitter' => '#',
		   'googleplus' => '#'
	   ]);
    }
}
