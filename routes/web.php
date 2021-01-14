<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware' => ['auth']], function (){
    Route::get('dashboard', 'DashboardController@dashboard')->name('admin.dashboard');
    Route::resource('user', 'UserController');
    Route::resource('service', 'ServiceController');
    Route::resource('package', 'PackageController');

    Route::group(['prefix'=>'application'], function (){
        Route::group(['prefix'=>'setting', 'as' => 'setting.'], function (){
            Route::resource('language', 'LanguageController');
            Route::resource('mail', 'MailController');
            //Route::resource('mail', 'MailController');
            Route::resource('identity', 'MailController');
            Route::resource('contact', 'MailController');
            Route::resource('seo', 'MailController');
            Route::resource('oAuth', 'MailController');

//            Route::get('/identity', 'SettingController@identity')->name('identity');
//            Route::post('/identity/image', 'SettingController@updateIdentityImage')->name('identity_image.update');
//            Route::post('/identity/color', 'SettingController@updateIdentityColor')->name('identity_color.update');
//
//            Route::get('/contact', 'SettingController@contact')->name('contact');
//            Route::post('/contact', 'SettingController@updateContact')->name('contact.update');
//
//            Route::get('/seo', 'SettingController@seo')->name('seo');
//            Route::post('/seo', 'SettingController@updateSeo')->name('seo.update');
//
//            Route::get('/o-auth', 'SettingController@oAuth')->name('oAuth');
//            Route::post('/o-auth', 'SettingController@updateOAuth')->name('oAuth.update');
        });
    });
});


Auth::routes();

Route::get('/home', function (){
    return redirect()->route('admin.dashboard');
})->name('home');
