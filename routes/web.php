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

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/reservation');
});

Route::resource('/reservation', 'RequestController');

Route::resource('/activities', 'ActivityController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/calendar', function(){
    return view('reservation.calendar');
});

Route::put('/activities/state/{id}','ActivityController@state');

Route::post('/activities/{id}/sendMail', 'ActivityController@sendMail');
