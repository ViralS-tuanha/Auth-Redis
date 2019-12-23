<?php

return [
    'auth_domain' => env('SERVER_AUTH', 'http://devauth.dxmb.vn/'),
    'call_back' => env('CALL_BACK', 'api/v1/login-back'),
    'prefix_cache' => env('AUTH_CACHE_PREFIX', 'TAOLE'),
    'login_uri' => env('LOGIN_URL', 'api/v1/user/auth/get-token'),
    'register_uri' => env('REGISTER_URL', 'api/v1/user/auth/register'),
    'reset_password_uri' => env('RESET_PASSWORD_URI', 'api/v1/user/auth/password/email'),
    'confirm_reset_uri' => env('RESET_CONFIRM_URI', 'api/v1/user/auth/password/reset'),
    'profile_uri' => env('PROFILE_URI', 'api/v1/profiles/{id}'),
    'refresh_token' => env('PROFILE_URI', 'api/v1/user/auth/refresh-token'),
    'token_web_auth' => env('TOKEN_WEB_AUTH', "login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d")
];
