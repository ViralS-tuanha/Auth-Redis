<?php

namespace ViralMS\AuthApiGateway;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use ViralMS\AuthApiGateway\Traits\ConsumesExternalService;

class AuthDemoController
{
    use ConsumesExternalService;

    public function login()
    {
        return view('login_customize::login');
    }

    public function callback(Request $request)
    {
        $domainAuth = config('authms.auth_domain');
        $uriCallBack = config('authms.call_back');
        $response = $this->performRequest($domainAuth, 'GET', $uriCallBack, [], ['code' => $request->code]);
        $data = json_decode($response, true);
        $session_id = session()->getId();
        session()->put($session_id, $data['data']);
        return redirect('/home');
    }

    public function logout()
    {
        $prefix = config('authms.prefix_cache');
        $sessionId = session()->getId();
        $sessionValue = session()->get($sessionId);
        session()->forget($sessionId);
        Redis::del($prefix.':'.$sessionValue);
        return redirect('/login');
    }
}
