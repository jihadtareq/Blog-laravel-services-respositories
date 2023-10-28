<?php
Route::prefix('users')->middleware('auth:api')->group(function(){

    Route::get('register','RegisterController@register');
    
});