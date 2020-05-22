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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Example Routes
// Route::view('/', 'landing');
// Route::match(['get', 'post'], '/dashboard', function(){
//     return view('dashboard');
// });
// Route::view('/pages/slick', 'pages.slick');
// Route::view('/pages/datatables', 'pages.datatables');
// Route::view('/pages/blank', 'pages.blank');

// Route::view('/prova', 'layouts.user.layout');
// Route::view('/mydream', 'user_pages.mydream');

// Route::view('/profile', 'user_pages.profile');

// Route::resource('/dream', 'DreamsController');

Route::middleware(['auth'])->group(function(){

  Route::resource('/dream', 'DreamsController');

  Route::get('/profile', 'ProfilesControllers@userUpdate');

});

Route::middleware(['auth', 'isAdmin'])->group(function(){

});
