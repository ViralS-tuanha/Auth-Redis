<?php

Route::group(['middleware' => 'web'],  function () {
    Route::get('auth/callback/', '\TuanHA\AuthApiGateway\AuthDemoController@callback' )->name('login.callback');

    Route::get('/login', '\TuanHA\AuthApiGateway\AuthDemoController@login' )->name('login')->middleware('guest');

    Route::post('/logout', '\TuanHA\AuthApiGateway\AuthDemoController@logout' )->name('logout')->middleware('auth');

    Route::fallback(function () {
        return redirect(url('/login'));
    });

});
