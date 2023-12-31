<?php
Route::prefix('users')->group(function(){
    Route::post('/register','UserController@register');
    
    Route::group(['middleware' => ['auth:api','userCheck','activeAccount']], function () {
        Route::get('/','UserController@index');
        Route::get('/{userId}','UserController@show');
        Route::post('/deactivate-account','UserController@deactivateUserAccount');
        // Route::delete('/delete','UserController@destory');
        Route::patch('/update-info','UserController@update');
        Route::get('/user/account','UserController@userAccount');
    });
});