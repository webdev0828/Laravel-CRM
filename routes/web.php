<?php

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
Route::get('/profile/setting', function () {
    return view('profile.setting');
});

//client action
Route::get('/dashboard/clients', 'HomeController@dashboard')->name('dashboard');
Route::post('/profile/setting/update', 'ClientController@profileSettingUpdate')->name('setting');
Route::post('/client/update', 'ClientController@clientUpdate')->name('clientupdate');
Route::post('/client/add', 'AdminController@clientAdd')->name('clientadd');
Route::get('/client/status/paused/{id}', 'ClientController@clientStatusUpdate')->name('clientstatuspaused');
Route::get('/client/search', 'ClientController@clientSearch')->name('clientsearch');
Route::post('/client/status/change', 'ClientController@clientStatusChange')->name('clientstatusupdate');
Route::get('/client/show/{id}', 'ClientController@clientShowByID')->name('showclient');
Route::post('/client/add/notes', 'ClientController@clientAddNotes')->name('addnotes');
Route::post('/client/add/notesanddetail', 'ClientController@clientAddNotesAndDetail')->name('addnotesanddetail');

//todo action
Route::get('/action/todo', 'HomeController@todoAction')->name('todoAction');

//usermanagement action
Route::get('/user/list', 'AdminController@index')->name('usermanagement');
Route::post('/user/add', 'AdminController@userAdd')->name('adduser');
Route::post('/user/update', 'AdminController@userUpdate')->name('updateuser');
Route::get('/user/delete/{id}', 'AdminController@userDelete')->name('deleteuser');

//Task action
Route::get('/tasks', 'HomeController@tasks')->name('tasks');

//Logs action
Route::get('/logs', 'HomeController@logs')->name('logs');