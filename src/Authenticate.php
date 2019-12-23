<?php

namespace  TuanHA\AuthApiGateway;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class Authenticate
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
        $sessionId = session()->getId();
        $sessionValue = session()->get($sessionId);
        $session = Redis::get($prefix.':'.$sessionValue);
        $session = unserialize(unserialize($session));
        if (!isset($session['login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d'])) {
            header("Location: ".$domainAuth."login?call_back=". route('login.callback'));
            exit;
        } else {
            return $next($request);
        }
    }
}
