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
	$steps = [
		['title'=>'Create Account', 'description' => 'To use this web application, create an account first by registering <a href="/register">here</a>. Your progress will be saved on your account.'],
		['title'=>'Start Saving', 'description' => 'Get some beautiful jar, put your money inside it. Follow the week deposit value, remember no cheating! 😁'],
		['title'=>'Checkmark It', 'description' => 'We will need to checkmark our progress. Click the item inside this <a href="/home">list</a> , then it will be marked as done.'],
		['title'=>'Keep It Up', 'description' => 'It gonna be a long journey, but be persistent! Never ever give up. Keep doing it until week 52, hopefully you will manage to finish this challenge. Good luck! &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;'],
	];
    return view('welcome', compact('steps'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/challenge/change-state', 'CompleteChallengeController@changeState');
