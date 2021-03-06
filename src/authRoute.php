<?php

Route::group(['middleware' => 'web'],  function () {
    Route::get('auth/callback/', '\ViralMS\AuthApiGateway\AuthDemoController@callback' )->name('login.callback');

    Route::get('/login', '\ViralMS\AuthApiGateway\AuthDemoController@login' )->name('login')->middleware('guest');

    Route::post('/logout', '\ViralMS\AuthApiGateway\AuthDemoController@logout' )->name('logout')->middleware('auth');

    Route::fallback(function () {
        return redirect(url('/login'));
    });

});
