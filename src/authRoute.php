<?php

Route::get('auth/callback/', 'TuanHA\AuthApiGateway\AuthDemoController@callback' )->name('login.callback');

Route::get('/login', 'TuanHA\AuthApiGateway\AuthDemoController@login' )->name('auth.login')->middleware('guest.redis');

Route::post('/logout', 'TuanHA\AuthApiGateway\AuthDemoController@logout' )->name('auth.login')->middleware('auth.redis');

Route::fallback(function () {
    return redirect(url('/login'));
});
