<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//burger get and post

Route::apiResource('burger', 'API\BurgerController');


//beverage get and post

Route::apiResource('beverage', 'API\BeverageController');

//combo meals get and post

Route::apiResource('combo', 'API\ComboController');