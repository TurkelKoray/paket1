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
	Route::get('/', 'HomeController@homePage');                                              // index page
	Route::get('/cikis', 'Auth\LoginController@logout');
	Route::get('/admin', 'Auth\LoginController@showLoginForm')->name('admin');
	Route::post('/send', 'HomeController@send');                                             // Mesaj gönder
	Route::post('/wesend', 'HomeController@weSend');                                         // Mesaj gönder
    Route::post("get-order","HomeController@getOrder");
    Route::get("ara","SearchController@search");

    Route::get('/home', 'HomeController@homePage')->name('home');

    Route::get("/{slug}/{subslug}&sayfa={page}", "HomeController@products");                // products page

    Route::get("/{slug}/{subslug}/{productslug}.html", "HomeController@productDetail");     // product-detail page

    Route::get("/{subslug}.htm", "HomeController@contact");                                 // contact page

    Route::get("/{slug}.html", "HomeController@newsDetail");                                 // news-detail page

    Route::get("/{slug}", "HomeController@page");                                           // page


	Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'Admin']], function () {


		Route::get('/slug/{slug}', 'SlugController@slug');

		Route::get('/index', 'AdminController@index');

		Route::group(['prefix' => 'settings', 'middleware' => ['Admin']], function () {

			Route::get('/index', 'SettingsController@index');

			Route::post('/update', 'SettingsController@update')->middleware("demo");

			Route::get('/maps', 'SettingsController@maps');

			Route::post('/mapsupdate', 'SettingsController@mapsupdate')->middleware("demo");

			Route::get('/seo', 'SettingsController@seo');

			Route::get('/ogimages', 'SettingsController@ogimages');

			Route::post('/ogimagesupdate', 'SettingsController@ogimagesupdate')->middleware("demo");

            Route::get('/logo', 'SettingsController@logo');

            Route::post('/logoupdate', 'SettingsController@logoupdate')->middleware("demo");

			Route::post('/seoupdate', 'SettingsController@seoupdate')->middleware("demo");

			Route::get('/emailsettings', 'SettingsController@emailsettings');

			Route::post('/emailsettingsupdate', 'SettingsController@emailsettingsupdate')->middleware("demo");

			Route::get('/socialmedia', 'SettingsController@socialmedia');

			Route::post('/socialmediaupdate', 'SettingsController@socialmediaupdate')->middleware("demo");


		});

        Route::group(['prefix' => 'homecontent'], function () {

            Route::get('/index', 'HomeContentController@index');

            Route::get('/create', 'HomeContentController@create');

            Route::post('/store', 'HomeContentController@store')->middleware("demo");

            Route::get('/edit/{id}', 'HomeContentController@edit');

            Route::post('/update/{id}', 'HomeContentController@update')->middleware("demo");

            Route::get('/delete/{id}', 'HomeContentController@delete')->middleware("demo");

            Route::get('/menuSirala/{p}', 'HomeContentController@orders');


        });

		Route::group(['prefix' => 'menus'], function () {

			Route::get('/create', 'MenuController@create');

			Route::post('/store', 'MenuController@store')->middleware("demo");

			Route::get('/index', 'MenuController@index');

			Route::get('/edit/{id}', 'MenuController@edit');

			Route::post('/update/{id}', 'MenuController@update')->middleware("demo");

			Route::get('/delete/{id}', 'MenuController@delete')->middleware("demo");

			Route::get('/destroy/{id}', 'MenuController@destroy')->middleware("demo");

			Route::get('/resimsil/{id}', 'MenuController@resimsil')->middleware("demo");

			Route::get('/menuSirala/{p}', 'MenuController@menuSirala');

			Route::get('/gallery/{id}', 'MenuController@gallery');

			Route::post('/galleryadd/{id}', 'MenuController@galleryAdd')->middleware("demo");

			Route::get('/gallerySirala/{p}', 'MenuController@gallerySirala');

			Route::get('/gallerydelete/{id}', 'MenuController@galleryDelete')->middleware("demo");

			Route::get('/gallerydestroy/{id}', 'MenuController@galleryDestroy')->middleware("demo");
		});

		Route::group(['prefix' => 'submenus'], function () {

			Route::get('/create/{id}', 'SubmenuController@create');

			Route::post('/store', 'SubmenuController@store')->middleware("demo");

			Route::get('/index/{id}', 'SubmenuController@index');

			Route::get('/edit/{id}', 'SubmenuController@edit');

			Route::post('/update/{id}', 'SubmenuController@update')->middleware("demo");

			Route::get('/delete/{id}', 'SubmenuController@delete')->middleware("demo");

			Route::get('/destroy/{id}', 'SubmenuController@destroy')->middleware("demo");

			Route::get('/sirala/{p}', 'SubmenuController@sirala');

			Route::get('/gallery/{id}', 'SubmenuController@gallery');

			Route::post('/galleryadd/{id}', 'SubmenuController@galleryadd')->middleware("demo");

			Route::get('/gallerySirala/{p}', 'SubmenuController@gallerySirala');

			Route::get('/gallerySil/{id}', 'SubmenuController@gallerySil')->middleware("demo");
		});

        Route::group(['prefix' => 'products'], function () {

            Route::get('/create', 'ProductController@create');

            Route::post('/store', 'ProductController@store')->middleware("demo");

            Route::get('/index', 'ProductController@index');

            Route::get('/edit/{id}', 'ProductController@edit');

            Route::post('/update/{id}', 'ProductController@update')->middleware("demo");

            Route::get('/delete/{id}', 'ProductController@delete')->middleware("demo");

            Route::get('/destroy/{id}', 'ProductController@destroy')->middleware("demo");

            Route::get('/sirala/{p}', 'ProductController@sirala');

            Route::get('/gallery/{id}', 'ProductController@gallery');

            Route::post('/galleryadd/{id}', 'ProductController@galleryadd')->middleware("demo");

            Route::get('/gallerySirala/{p}', 'ProductController@gallerySirala');

            Route::get('/gallery-delete/{id}', 'ProductController@galleryDelete')->middleware("demo");
        });

        Route::group(['prefix' => 'orders'], function () {

            Route::get('/index', 'OrderController@index');

            Route::get('/cancel/{id}', 'OrderController@cancel');

            Route::get('/success/{id}', 'OrderController@success');

            Route::get('/delete/{id}', 'OrderController@delete')->middleware("demo");

            Route::get('/success-order', 'OrderController@orderSuccess');

            Route::get('/cancel-order', 'OrderController@orderCancel');

        });


		Route::group(['prefix' => 'sliders'], function () {
			Route::get('/create', 'SliderController@create');

			Route::post('/store', 'SliderController@store')->middleware("demo");

			Route::get('/index', 'SliderController@index');

			Route::get('/edit/{id}', 'SliderController@edit');

			Route::post('/update/{id}', 'SliderController@update')->middleware("demo");

			Route::get('/delete/{id}', 'SliderController@delete')->middleware("demo");

			Route::get('/destroy/{id}', 'SliderController@destroy')->middleware("demo");

			Route::get('/sliderSirala/{p}', 'SliderController@sliderSirala');
		});


		Route::group(['prefix' => 'users'], function () {
			Route::get('/usercreate', 'AdminController@usercreate');

			Route::post('/store', 'AdminController@store')->middleware("demo");

			Route::get('/userindex', 'AdminController@userindex');

			Route::get('/edit/{id}', 'AdminController@edit');

			Route::post('/update/{id}', 'AdminController@update')->middleware("demo");

			Route::get('/destroy/{id}', 'AdminController@destroy')->middleware("demotoastr");
		});


		Route::group(['prefix' => 'contact'], function () {

			Route::get('/index', 'ContactController@index');

			Route::get('/show/{id}', 'ContactController@show');

			Route::get('/old', 'ContactController@old');

			Route::get('/destroy/{id}', 'ContactController@destroy')->middleware("demo");

			Route::get('/delete/{id}', 'ContactController@delete')->middleware("demo");
		});


	});




