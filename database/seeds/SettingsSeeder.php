<?php

use Illuminate\Database\Seeder;
	use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('settings')->insert([
		   'email' => 'firma@domain.com',
		   'phone' => '(0256) 224 00 25',
		   'gsm' => '(0256) 224 00 25',
		   'fax' => '(0256) 224 00 25',
		   'headcode' => '#',
		   'bodycode' => '#',
		   'address' => '#',
		   'footer' => '© Yirmibeş Yazılım ve Danışmanlık - 2020 ',
		   'footerdesc' => 'foooter ek alan yazısı',
		   'mapskey' => 'AIzaSyAkUFTD4lPFEoRLgpyJ8lkfjzKMMCElW_c',
		   'googleCode' => '#',
		   'longitude' => '27.859426',
		   'latitude' => '37.856645',
		   'title' => 'Yirmibeş Yazılım',
		   'slogan' => 'Yirmibeş yazılım',
		   'ogimages' => '',
		   'description' => '',
		   'keywords' => '',
		   'facebook' => '#',
		   'twitter' => '#',
		   'pinteres' => '#',
		   'linkedin' => '#',
		   'googleplus' => '',
		   'hostname' => '',
		   'username' => '#',
		   'pasword' => '#',
		   'design' => '#'
	   ]);
    }
}
