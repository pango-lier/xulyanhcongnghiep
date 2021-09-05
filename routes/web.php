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


Route::group(['prefix'=>'/'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('about_us', 'HomeController@about_us');
    Route::get('{slug}+{id}/product.html', 'HomeController@product');
    Route::get('{slug}+{id}.html', 'HomeController@posts');
    Route::get('{slug}+{id}/cats.html', 'HomeController@cats');
    Route::post('postmail', 'ajaxController@postMail');
    Route::post('cmt/index', 'CommentController@getCmt');
    Route::post('cmt/store', 'CommentController@storeCmt');
    Route::get('/checkout', 'HomeController@getCheckOut');
    Route::post('/checkout', 'CartController@postCheckOut');
    Route::post('cart/buynow', 'CartController@buyNowToCart');
    Route::post('cart/add', 'CartController@addToCart');
    Route::post('cart/remove', 'CartController@remove');
});
Route::group(['prefix'=>'admin','namespace'=>'admin','middleware'=>['adminlogin']], function () {
    Route::get('/home', 'HomeController@home');
    Route::get('/login', 'HomeController@getLogin')->withoutMiddleware('adminlogin');
    Route::post('/login', 'HomeController@postLogin')->withoutMiddleware('adminlogin');
    Route::get('/logout', 'HomeController@getLogout')->withoutMiddleware('adminlogin');
    Route::group(['prefix'=>'category'], function () {
        Route::get('/', 'CategoryController@index');
        Route::get('/create', 'CategoryController@create');
        Route::post('/store', 'CategoryController@store');
        Route::get('/edit/{id}', 'CategoryController@edit');
        Route::post('/update/{id}', 'CategoryController@update');
        Route::get('/destroy/{id}', 'CategoryController@destroy');
    });
    Route::group(['prefix'=>'slider'], function () {
        Route::get('/', 'SliderController@index');
        Route::get('/create', 'SliderController@create');
        Route::post('/store', 'SliderController@store');
        Route::get('/edit/{id}', 'SliderController@edit');
        Route::post('/update/{id}', 'SliderController@update');
        Route::get('/destroy/{id}', 'SliderController@destroy');
    });
    Route::group(['prefix'=>'intercooperation'], function () {
        Route::get('/', 'IntercooperationController@index');
        Route::get('/create', 'IntercooperationController@create');
        Route::post('/store', 'IntercooperationController@store');
        Route::get('/edit/{id}', 'IntercooperationController@edit');
        Route::post('/update/{id}', 'IntercooperationController@update');
        Route::get('/destroy/{id}', 'IntercooperationController@destroy');
    });
    Route::group(['prefix'=>'post'], function () {
        Route::get('/', 'PostController@index');
        Route::get('/create', 'PostController@create');
        Route::post('/store', 'PostController@store');
        Route::get('/edit/{id}', 'PostController@edit');
        Route::post('/update/{id}', 'PostController@update');
        Route::get('/destroy/{id}', 'PostController@destroy');
    });
    Route::group(['prefix'=>'product'], function () {
        Route::get('/', 'ProductController@index');
        Route::get('/create', 'ProductController@create');
        Route::post('/store', 'ProductController@store');
        Route::get('/edit/{id}', 'ProductController@edit');
        Route::post('/update/{id}', 'ProductController@update');
        Route::get('/destroy/{id}', 'ProductController@destroy');
    });
    Route::group(['prefix'=>'setting'], function () {
        Route::get('/', 'SettingController@index');
        Route::get('/create', 'SettingController@create');
        Route::post('/store', 'SettingController@store');
        Route::get('/edit/{id}', 'SettingController@edit');
        Route::post('/update/{id}', 'SettingController@update');
        Route::get('/destroy/{id}', 'SettingController@destroy');
    });
    Route::group(['prefix'=>'catdes'], function () {
        Route::get('/', 'CatDesController@index');
        Route::get('/create', 'CatDesController@create');
        Route::post('/store', 'CatDesController@store');
        Route::get('/edit/{id}', 'CatDesController@edit');
        Route::post('/update/{id}', 'CatDesController@update');
        Route::get('/destroy/{id}', 'CatDesController@destroy');
    });
    Route::group(['prefix'=>'comment'], function () {
        Route::get('/', 'CommentController@index');
        Route::get('/create', 'CommentController@create');
        Route::post('/store', 'CommentController@store');
        Route::get('/edit/{id}', 'CommentController@edit');
        Route::post('/update/{id}', 'CommentController@update');
        Route::get('/destroy/{id}', 'CommentController@destroy');
    });
    Route::group(['prefix'=>'admin_user','middleware'=>['auth:admin_users','can:is-admin']], function () {
        Route::get('/', 'AdminUserController@index');
        Route::get('/create', 'AdminUserController@create');
        Route::post('/store', 'AdminUserController@store');
        Route::get('/edit/{id}', 'AdminUserController@edit');
        Route::post('/update/{id}', 'AdminUserController@update');
        Route::get('/destroy/{id}', 'AdminUserController@destroy');
    });
    Route::group(['prefix'=>'open'], function () {
        Route::get('/', 'OpenApiController@index');
        Route::get('/create', 'OpenApiController@create');
        Route::post('/store', 'OpenApiController@store');
        Route::get('/edit/{id}', 'OpenApiController@edit');
        Route::post('/update/{id}', 'OpenApiController@update');
        Route::get('/info/{uuid}/destroy', 'OpenApiController@destroy');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{any}', 'HomeController@index')->where('any', '.*');
