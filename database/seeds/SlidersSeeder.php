<?php

use Illuminate\Database\Seeder;
	use Illuminate\Support\Facades\DB;
class SlidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('sliders')->insert(
			[
				[
					'title' => "Yirmibeş yazılım" ,
					'img' => "slider-1.jpg",
					'lang'  => 'tr' ,
					'sira'  => 0
				] ,
				[
					'title' => "Yirmibeş yazılım" ,
					'img' => "slider-2.jpg",
					'lang'  => 'tr' ,
					'sira'  => 1
				],
				[
					'title' => "Yirmibeş yazılım" ,
					'img' => "slider-1.jpg",
					'lang'  => 'en' ,
					'sira'  => 0
				] ,
				[
					'title' => "Yirmibeş yazılım" ,
					'img' => "slider-2.jpg",
					'lang'  => 'en' ,
					'sira'  => 1
				]
			]
		);
    }
}
