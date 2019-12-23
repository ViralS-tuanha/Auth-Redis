<?php

Route::group(['middleware' => 'web'],  function () {
    Route::get('auth/callback/', '\TuanHA\AuthApiGateway\AuthDemoController@callback' )->name('login.callback');

    Route::get('/login', '\TuanHA\AuthApiGateway\AuthDemoController@login' )->name('auth.login')->middleware('guest');

    Route::post('/logout', '\TuanHA\AuthApiGateway\AuthDemoController@logout' )->name('auth.login')->middleware('auth');

    Route::fallback(function () {
        return redirect(url('/login'));
    });

});
