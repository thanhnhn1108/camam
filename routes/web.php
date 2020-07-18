<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
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

Route::get('/nopermission', function(){
    return '<center><h1>BẠN KHÔNG CÓ QUYỀN TRUY CẬP VÀO ADMIN!</h1>
    <a href="{{asset(/)}}">Về trang chủ</a>
    <center>';
})->name('nopermission');

Route::prefix('admin')->middleware('auth')->middleware('checkuser')->group(function(){
    Route::get('/',function(){
        return view('admin.index', ['namepage' => 'Trang chủ']);
    })->name('trangchu');
    Route::resource('/singer', 'SingerController')->middleware('auth');
});


// Route::get('admincp/login', ['as' => 'getLogin', 'uses' => 'Admin\AdminLoginController@getLogin']);
// Route::post('admincp/login', ['as' => 'postLogin', 'uses' => 'Admin\AdminLoginController@postLogin']);
// Route::get('admincp/logout', ['as' => 'getLogout', 'uses' => 'Admin\AdminLoginController@getLogout']);

// Route::group(['middleware' => 'checkAdminLogin', 'prefix' => 'admincp', 'namespace' => 'Admin'], function() {
// 	Route::get('/', function() {
// 		return view('admin.home');
// 	});
// });



Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
