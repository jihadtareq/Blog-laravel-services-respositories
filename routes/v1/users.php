<?php
// Route::prefix('users')->middleware('auth:api')->group(function(){
Route::prefix('users')->group(function(){

    Route::resource('/','UserController');
    Route::get('register','RegisterController@register');
});