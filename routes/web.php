<?php

use App\Repositories\Genre\GenreRepository;
use App\Repositories\Movie\MovieRepository;
use Zttp\Zttp;
use Zttp\ZttpResponse;

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

Route::get('/movies', 'Api\V1\MovieController@index');


