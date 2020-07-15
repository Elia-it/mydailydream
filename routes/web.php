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
    if(Auth::check()){
      if(Auth::user()->role->role == 'admin'){
        return redirect('/adminpanel');
      }else{
        return redirect('/home');
      }

    }else{
      return view('landing');
    }
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');



// Route::get('/home', 'HomeController@index')->name('home');


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
  Route::get('/home', 'HomeController@index')->name('home');

  Route::resource('/dream', 'DreamController');

  Route::post('/upload/store', 'AttatchmentController@store')->name('check.and.upload');

  Route::resource('/dream/file', 'AttatchmentController')->only([
    'update', 'destroy', 'create'
  ]);

  Route::resource('/profile', 'ProfileController')->except([
      'create', 'store', 'index'
  ]);

  Route::resource('/profile/img', 'User_attatchmentController')->only([
    'update', 'destroy'
  ]);



  Route::any('/profile/newsletter/{change_sub}', 'ProfileController@setNewsletter')->name('sub_newsletter');

});





// Route::view('/prova', 'prova');

Route::middleware(['auth', 'isAdmin'])->group(function(){



  Route::view('/adminpanel', 'admin_pages.panel');

  Route::resource('/adminpanel/profile', 'AdminProfileController', [
    'names' => 'admin.profile'
  ]);

  // Route::post('/adminpanel/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
  Route::get('/adminpanel/dashboard' , 'AdminController@dashboard')->name('admin.dashboard');

  Route::any('/adminpanel/users', 'UserController@index')->name('users.table');


  // Route::resource('/adminpanel/emotions', 'EmotionController');

  Route::resource('/adminpanel/techniques', 'TechniqueController');

  // Route::resource('/adminpanel/colors', 'ColorController');

  Route::resource('/adminpanel/user', 'UserController', [
    'names' => 'admin.user'
  ]);



// Data Route ----------------

  Route::resource('/adminpanel/colors', 'AdminColorController', [
    'names' => 'admin.color'
  ]);
  Route::resource('/adminpanel/emotions', 'AdminEmotionController', [
    'names' => 'admin.emotion'
  ]);
  Route::resource('/adminpanel/moods', 'AdminMoodController', [
    'names' => 'admin.mood'
  ]);
  Route::resource('/adminpanel/tags', 'AdminTagController', [
    'names' => 'admin.tag'
  ]);
  Route::resource('/adminpanel/techniques', 'AdminTechniqueController', [
    'names' => 'admin.technique'
  ]);
  Route::resource('/adminpanel/types', 'AdminTypeController', [
    'names' => 'admin.type'
  ]);

  Route::resource('/adminpanel/roles', 'AdminRoleController', [
    'names' => 'admin.role'
  ]);


});
