<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware' => ['auth']], function (){
    Route::get('dashboard', 'DashboardController@dashboard')->name('admin.dashboard');
    Route::resource('user', 'UserController');
    Route::resource('service', 'ServiceController');
    Route::resource('package', 'PackageController');

    Route::group(['prefix'=>'application'], function (){
        Route::group(['prefix'=>'setting', 'as' => 'setting.'], function (){
            Route::resource('language', 'LanguageController');
            Route::get('identity', 'SettingController@identity')->name('identity.index');
            Route::post('identity/image', 'SettingController@updateIdentityImage')->name('identity.image.update');
            Route::post('identity/color', 'SettingController@updateIdentityColor')->name('identity.color.update');
            Route::get('contact', 'SettingController@contact')->name('contact.index');
            Route::post('contact', 'SettingController@updateContact')->name('contact.update');
            Route::get('seo', 'SettingController@seo')->name('seo.index');
            Route::post('seo', 'SettingController@updateSeo')->name('seo.update');
            Route::get('oAuth', 'SettingController@oauth')->name('oauth.index');
            Route::post('oAuth', 'SettingController@updateOAuth')->name('oauth.update');
            Route::get('smtp', 'SettingController@smtp')->name('smtp.index');
            Route::post('smtp', 'SettingController@updateSmtp')->name('smtp.update');
            Route::post('smtp/test-mail', 'SettingController@testSmtpMail')->name('smtp.test');
        });
    });
});




Route::get('/home', function (){
    return redirect()->route('admin.dashboard');
})->name('home');
