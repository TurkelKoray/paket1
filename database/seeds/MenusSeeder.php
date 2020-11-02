<?php

	use Illuminate\Database\Seeder;
	use Illuminate\Support\Facades\DB;

	class MenusSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			DB::table('menus')->insert(
				[
					[
						'name'  => 'HAKKIMIZDA' ,
						'slug'  => 'hakkimizda' ,
						'title' => "Yirmibeş yazılım" ,
						'img' => 'page.jpg',
						'text1' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin finibus eros mattis est volutpat, vel mollis elit rutrum. Fusce varius diam commodo, laoreet magna vel, ultricies lectus. Quisque tincidunt massa eget massa bibendum, a scelerisque dui blandit. Nullam ut elit felis. Maecenas suscipit ultrices nunc et auctor. Phasellus ac augue ac risus efficitur condimentum at ut erat. Nam elementum velit ac leo eleifend, a commodo sapien vehicula. Maecenas tempor dignissim augue, non elementum metus. Proin suscipit ullamcorper dolor, id placerat quam ultricies facilisis. Curabitur sed nibh vel lacus dictum elementum eu vel enim. Integer vel vestibulum ante. Aenean in rhoncus erat, quis posuere libero. Integer id auctor ex. Maecenas pharetra scelerisque malesuada. Donec volutpat bibendum vehicula.",
						'text2' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin finibus eros mattis est volutpat, vel mollis elit rutrum. Fusce varius diam commodo, laoreet magna vel, ultricies lectus. Quisque tincidunt massa eget massa bibendum, a scelerisque dui blandit. Nullam ut elit felis. Maecenas suscipit ultrices nunc et auctor. Phasellus ac augue ac risus efficitur condimentum at ut erat. Nam elementum velit ac leo eleifend, a commodo sapien vehicula. Maecenas tempor dignissim augue, non elementum metus. Proin suscipit ullamcorper dolor, id placerat quam ultricies facilisis. Curabitur sed nibh vel lacus dictum elementum eu vel enim. Integer vel vestibulum ante. Aenean in rhoncus erat, quis posuere libero. Integer id auctor ex. Maecenas pharetra scelerisque malesuada. Donec volutpat bibendum vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin finibus eros mattis est volutpat, vel mollis elit rutrum. Fusce varius diam commodo, laoreet magna vel, ultricies lectus. Quisque tincidunt massa eget massa bibendum, a scelerisque dui blandit. Nullam ut elit felis. Maecenas suscipit ultrices nunc et auctor. Phasellus ac augue ac risus efficitur condimentum at ut erat. Nam elementum velit ac leo eleifend, a commodo sapien vehicula. Maecenas tempor dignissim augue, non elementum metus. Proin suscipit ullamcorper dolor, id placerat quam ultricies facilisis. Curabitur sed nibh vel lacus dictum elementum eu vel enim. Integer vel vestibulum ante. Aenean in rhoncus erat, quis posuere libero. Integer id auctor ex. Maecenas pharetra scelerisque malesuada. Donec volutpat bibendum vehicula.",
						'lang'  => 'tr' ,
						'type'  => 'hs' ,
						'sira'  => 0
					] ,
					[
						'name'  => 'REFERANSLAR' ,
						'slug'  => 'referanslar' ,
						'title' => "Yirmibeş yazılım" ,
						'img' => 'page.jpg',
                        'text1' => '',
                        'text2' => '',
                        'lang'  => 'tr' ,
						'type'  => 'hs' ,
						'sira'  => 1
					] ,
					[
						'name'  => 'DEĞERLERİMİZ' ,
						'slug'  => 'degerlerimiz' ,
						'title' => "Yirmibeş yazılım" ,
						'img' => 'page.jpg',
                        'text1' => '',
                        'text2' => '',
                        'lang'  => 'tr' ,
						'type'  => 'hs' ,
						'sira'  => 2 ,
					] ,
					[
						'name'  => 'İLETİŞİM' ,
						'slug'  => 'iletisim' ,
						'title' => "Yirmibeş yazılım" ,
						'img' => 'page.jpg',
                        'text1' => '',
                        'text2' => '',
                        'lang'  => 'tr' ,
						'type'  => 'is' ,
						'sira'  => 3 ,
					],
					[
						'name'  => 'ABOUT' ,
						'slug'  => 'about' ,
						'title' => "Yirmibeş yazılım" ,
						'img' => 'page.jpg',
                        'text1' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin finibus eros mattis est volutpat, vel mollis elit rutrum. Fusce varius diam commodo, laoreet magna vel, ultricies lectus. Quisque tincidunt massa eget massa bibendum, a scelerisque dui blandit. Nullam ut elit felis. Maecenas suscipit ultrices nunc et auctor. Phasellus ac augue ac risus efficitur condimentum at ut erat. Nam elementum velit ac leo eleifend, a commodo sapien vehicula. Maecenas tempor dignissim augue, non elementum metus. Proin suscipit ullamcorper dolor, id placerat quam ultricies facilisis. Curabitur sed nibh vel lacus dictum elementum eu vel enim. Integer vel vestibulum ante. Aenean in rhoncus erat, quis posuere libero. Integer id auctor ex. Maecenas pharetra scelerisque malesuada. Donec volutpat bibendum vehicula.",
                        'text2' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin finibus eros mattis est volutpat, vel mollis elit rutrum. Fusce varius diam commodo, laoreet magna vel, ultricies lectus. Quisque tincidunt massa eget massa bibendum, a scelerisque dui blandit. Nullam ut elit felis. Maecenas suscipit ultrices nunc et auctor. Phasellus ac augue ac risus efficitur condimentum at ut erat. Nam elementum velit ac leo eleifend, a commodo sapien vehicula. Maecenas tempor dignissim augue, non elementum metus. Proin suscipit ullamcorper dolor, id placerat quam ultricies facilisis. Curabitur sed nibh vel lacus dictum elementum eu vel enim. Integer vel vestibulum ante. Aenean in rhoncus erat, quis posuere libero. Integer id auctor ex. Maecenas pharetra scelerisque malesuada. Donec volutpat bibendum vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin finibus eros mattis est volutpat, vel mollis elit rutrum. Fusce varius diam commodo, laoreet magna vel, ultricies lectus. Quisque tincidunt massa eget massa bibendum, a scelerisque dui blandit. Nullam ut elit felis. Maecenas suscipit ultrices nunc et auctor. Phasellus ac augue ac risus efficitur condimentum at ut erat. Nam elementum velit ac leo eleifend, a commodo sapien vehicula. Maecenas tempor dignissim augue, non elementum metus. Proin suscipit ullamcorper dolor, id placerat quam ultricies facilisis. Curabitur sed nibh vel lacus dictum elementum eu vel enim. Integer vel vestibulum ante. Aenean in rhoncus erat, quis posuere libero. Integer id auctor ex. Maecenas pharetra scelerisque malesuada. Donec volutpat bibendum vehicula.",
                        'lang'  => 'en' ,
						'type'  => 'hs' ,
						'sira'  => 0
					] ,
					[
						'name'  => 'REFERANCES' ,
						'slug'  => 'referances' ,
						'title' => "Yirmibeş yazılım" ,
						'img' => 'page.jpg',
                        'text1' => '',
                        'text2' => '',
                        'lang'  => 'en' ,
						'type'  => 'hs' ,
						'sira'  => 1
					] ,
					[
						'name'  => 'VALUES' ,
						'slug'  => 'values' ,
						'title' => "Yirmibeş yazılım" ,
						'img' => 'page.jpg',
                        'text1' => '',
                        'text2' => '',
                        'lang'  => 'en' ,
						'type'  => 'hs' ,
						'sira'  => 2 ,
					] ,
					[
						'name'  => 'CONTACT' ,
						'slug'  => 'contact' ,
						'title' => "Yirmibeş yazılım" ,
						'img' => 'page.jpg',
                        'text1' => '',
                        'text2' => '',
                        'lang'  => 'en' ,
						'type'  => 'is' ,
						'sira'  => 3 ,
					]

				]
			);
		}
	}
