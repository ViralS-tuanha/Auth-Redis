<?php

namespace TuanHA\AuthApiGateway;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use TuanHA\AuthApiGateway\Traits\ConsumesExternalService;

class AuthDemoController extends Controller
{
    use ConsumesExternalService;

    public function login()
    {
        return view('auth.login');
    }

    public function callback(Request $request)
    {
        $domainAuth = config('authms.auth_domain');
        $uriCallBack = config('authms.call_back');
        $prefix = config('authms.prefix_cache');
        $response = $this->performRequest($domainAuth, 'GET', $uriCallBack, [], ['code' => $request->code]);
        $data = json_decode($response, true);
        $session_id = session()->getId();
        $session = Redis::get($prefix.':'.$data['data']);

        session()->put($session_id, $data['data']);
        return redirect('/home');
    }

    public function logout()
    {
        $prefix = config('authms.prefix_cache');
        $sessionId = session()->getId();
        $sessionValue = session()->get($sessionId);
        session()->forget($sessionId);
//        Redis::command('del', [$prefix.':'.$session_id]);
        $redis = Redis::del($prefix.':'.$sessionValue);
        return redirect('/login');
    }
}
