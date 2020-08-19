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

/*Route::get('/home', function(){
    return redirect('admin/users');
});*/



Route::get('/', function(){ 
    view('welcome'); 
});

//Route::redirect("/", "/admin/users");

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('welcome');

//Route::resource('dashboard', 'DashboardController')->middleware('auth');



//Namespace Admin you don't need to put Admin in front of controller
//Prefix start admin to the start of the URL you don't need to include it anymore
//Name add admin. into ours routes so we don't need to pass it anymore
//Group all the routes inside the prefix will have the name.
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except'=>['show','create','store']])->middleware('auth');
});

Route::post('/register', 'Auth\RegisterController@validator')->middleware('auth');

Auth::routes();

