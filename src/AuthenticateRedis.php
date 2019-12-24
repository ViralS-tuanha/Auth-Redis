<?php

namespace  TuanHA\AuthApiGateway;

use Closure;
use Illuminate\Support\Facades\Redis;

class AuthenticateRedis
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     * @param Closure $next
     * @return string
     */
    public function handle($request, Closure $next)
    {
        $prefix = config('authms.prefix_cache');
        $domainAuth = config('authms.auth_domain');
        $loginWeb = config('authms.token_web_auth');
        $sessionId = session()->getId();
        $sessionValue = session()->get($sessionId);
        $session = Redis::get($prefix.':'.$sessionValue);
        $session = unserialize(unserialize($session));
        if (!isset($session[$loginWeb])) {
            header("Location: ".$domainAuth."login?call_back=". route('login.callback'));
            exit;
        } else {
            return $next($request);
        }
    }
}
