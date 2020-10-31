<?php

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
    // return view('welcome');
    $response = Zttp::get('https://api.themoviedb.org/3/movie/latest', [
        'api_key' => '276acd1bebcfb5c2a5ed2e93c3e12786',
    ]);

    dump($response->json());


    // https://api.themoviedb.org/3/movie/top_rated?api_key=276acd1bebcfb5c2a5ed2e93c3e12786&language=en-US&page=2

    $response = Zttp::get('https://api.themoviedb.org/3/movie/top_rated', [
        'api_key'  => '276acd1bebcfb5c2a5ed2e93c3e12786',
        'language' => 'en-US',
        'page'=> '2'
    ]);

    dump($response->json());

});
