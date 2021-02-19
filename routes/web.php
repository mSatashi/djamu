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

Route::resource('/', WelcomeController::class);

Route::resource('/installasi', Admin\WebController::class);
Route::get('/404', function () {
    return view('error.404');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('google', 'GoogleController@redirect');
Route::get('google/callback', 'GoogleController@callback');

Route::get('facebook', 'FacebookController@redirect');
Route::get('/facebook/callback', 'FacebookController@callback');

Route::resource('/toko', TokoController::class)->parameters([
    'Product' => 'myProduct',
]);
Route::get('/toko/produk/{myProduct}', 'TokoController@show');

Route::get('/checkout','CheckoutController@checkout');
Route::get('province','CheckoutController@get_province')->name('province');
Route::get('/kota/{id}','CheckoutController@get_city');
Route::get('/origin={city_origin}&destination={city_destination}&weight={weight}&courier={courier}','CheckoutController@get_ongkir');

Route::resource('admin/jumboslider', Admin\JumboSliderController::class);

Route::resource('admin/produk', Admin\ProductController::class);

Route::resource('/admin/website', Admin\ConfigController::class);

Route::resource('/admin/users', Admin\UserController::class);