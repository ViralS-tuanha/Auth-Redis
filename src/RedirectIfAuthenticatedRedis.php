<?php

namespace  ViralMS\AuthApiGateway;

use Closure;
use Illuminate\Support\Facades\Redis;

class RedirectIfAuthenticatedRedis
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $prefix = config('authms.prefix_cache');
        $sessionId = session()->getId();
        $sessionValue = session()->get($sessionId);
        $session = Redis::get($prefix.':'.$sessionValue);
        if (!is_null($session)) {
            return redirect('/home');
        }

        return $next($request);
    }
}
