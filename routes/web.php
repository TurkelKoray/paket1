<?php

	use Illuminate\Support\Facades\Route;

	/*
	|--------------------------------------------------------------------------
	|--------------------------------------------------------------------------
	| Web Routes
	|
	| Here is where you can register web routes for your application. These
	| routes are loaded by the RouteServiceProvider within a group which
	| contains the "web" middleware group. Now create something great!
	|
	*/

    Auth::routes();
	Route::get('/', 'HomeController@homePage');
	Route::get('/cikis', 'Auth\LoginController@logout');
	Route::get('/admin', 'Auth\LoginController@showLoginForm')->name('admin');
	Route::post('/send', 'HomeController@send');                         // Mesaj gönder
	Route::post('/wesend', 'HomeController@weSend');                         // Mesaj gönder
    Route::post("get-order","HomeController@getOrder");

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get("/{slug}/{subslug}&sayfa={page}", "HomeController@products");

    Route::get("/{slug}/{subslug}/{productslug}.html", "HomeController@productDetail");


    Route::get("/{slug}/{subslug}", "HomeController@subpage");

    Route::get("/{subslug}.htm", "HomeController@contact");

    Route::get("/{slug}", "HomeController@page");


	Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'Admin']], function () {


		Route::get('/slug/{slug}', 'SlugController@slug');

		Route::get('/index', 'AdminController@index');

		Route::group(['prefix' => 'settings', 'middleware' => ['Admin']], function () {

			Route::get('/index', 'SettingsController@index');

			Route::post('/update', 'SettingsController@update');

			Route::get('/maps', 'SettingsController@maps');

			Route::post('/mapsupdate', 'SettingsController@mapsupdate');

			Route::get('/seo', 'SettingsController@seo');

			Route::get('/ogimages', 'SettingsController@ogimages');

			Route::post('/ogimagesupdate', 'SettingsController@ogimagesupdate');

			Route::post('/seoupdate', 'SettingsController@seoupdate');

			Route::get('/emailsettings', 'SettingsController@emailsettings');

			Route::post('/emailsettingsupdate', 'SettingsController@emailsettingsupdate');

			Route::get('/socialmedia', 'SettingsController@socialmedia');

			Route::post('/socialmediaupdate', 'SettingsController@socialmediaupdate');


		});

        Route::group(['prefix' => 'homecontent'], function () {

            Route::get('/index', 'HomeContentController@index');

            Route::get('/create', 'HomeContentController@create');

            Route::post('/store', 'HomeContentController@store');

            Route::get('/edit/{id}', 'HomeContentController@edit');

            Route::post('/update/{id}', 'HomeContentController@update');

            Route::get('/delete/{id}', 'HomeContentController@delete');

            Route::get('/menuSirala/{p}', 'HomeContentController@orders');


        });

		Route::group(['prefix' => 'menus'], function () {

			Route::get('/create', 'MenuController@create');

			Route::post('/store', 'MenuController@store');

			Route::get('/index', 'MenuController@index');

			Route::get('/edit/{id}', 'MenuController@edit');

			Route::post('/update/{id}', 'MenuController@update');

			Route::get('/delete/{id}', 'MenuController@delete');

			Route::get('/destroy/{id}', 'MenuController@destroy');

			Route::get('/resimsil/{id}', 'MenuController@resimsil');

			Route::get('/menuSirala/{p}', 'MenuController@menuSirala');

			Route::get('/gallery/{id}', 'MenuController@gallery');

			Route::post('/galleryadd/{id}', 'MenuController@galleryAdd');

			Route::get('/gallerySirala/{p}', 'MenuController@gallerySirala');

			Route::get('/gallerydelete/{id}', 'MenuController@galleryDelete');

			Route::get('/gallerydestroy/{id}', 'MenuController@galleryDestroy');
		});

		Route::group(['prefix' => 'submenus'], function () {

			Route::get('/create/{id}', 'SubmenuController@create');

			Route::post('/store', 'SubmenuController@store');

			Route::get('/index/{id}', 'SubmenuController@index');

			Route::get('/edit/{id}', 'SubmenuController@edit');

			Route::post('/update/{id}', 'SubmenuController@update');

			Route::get('/delete/{id}', 'SubmenuController@delete');

			Route::get('/destroy/{id}', 'SubmenuController@destroy');

			Route::get('/sirala/{p}', 'SubmenuController@sirala');

			Route::get('/gallery/{id}', 'SubmenuController@gallery');

			Route::post('/galleryadd/{id}', 'SubmenuController@galleryadd');

			Route::get('/gallerySirala/{p}', 'SubmenuController@gallerySirala');

			Route::get('/gallerySil/{id}', 'SubmenuController@gallerySil');
		});

        Route::group(['prefix' => 'products'], function () {

            Route::get('/create', 'ProductController@create');

            Route::post('/store', 'ProductController@store');

            Route::get('/index', 'ProductController@index');

            Route::get('/edit/{id}', 'ProductController@edit');

            Route::post('/update/{id}', 'ProductController@update');

            Route::get('/delete/{id}', 'ProductController@delete');

            Route::get('/destroy/{id}', 'ProductController@destroy');

            Route::get('/sirala/{p}', 'ProductController@sirala');

            Route::get('/gallery/{id}', 'ProductController@gallery');

            Route::post('/galleryadd/{id}', 'ProductController@galleryadd');

            Route::get('/gallerySirala/{p}', 'ProductController@gallerySirala');

            Route::get('/gallery-delete/{id}', 'ProductController@galleryDelete');
        });


		Route::group(['prefix' => 'sliders'], function () {
			Route::get('/create', 'SliderController@create');

			Route::post('/store', 'SliderController@store');

			Route::get('/index', 'SliderController@index');

			Route::get('/edit/{id}', 'SliderController@edit');

			Route::post('/update/{id}', 'SliderController@update');

			Route::get('/delete/{id}', 'SliderController@delete');

			Route::get('/destroy/{id}', 'SliderController@destroy');

			Route::get('/sliderSirala/{p}', 'SliderController@sliderSirala');
		});


		Route::group(['prefix' => 'users'], function () {
			Route::get('/usercreate', 'AdminController@usercreate');

			Route::post('/store', 'AdminController@store');

			Route::get('/userindex', 'AdminController@userindex');

			Route::get('/edit/{id}', 'AdminController@edit');

			Route::post('/update/{id}', 'AdminController@update');

			Route::get('/destroy/{id}', 'AdminController@destroy');
		});


		Route::group(['prefix' => 'contact'], function () {

			Route::get('/index', 'ContactController@index');

			Route::get('/show/{id}', 'ContactController@show');

			Route::get('/old', 'ContactController@old');

			Route::get('/destroy/{id}', 'ContactController@destroy');

			Route::get('/delete/{id}', 'ContactController@delete');
		});


	});




