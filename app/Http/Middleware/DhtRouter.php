<?php

namespace App\Http\Middleware;

use Closure;

class DhtRouter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->get("id"))
        {
            $hash = hexdec(substr(md5($request->get("id")), 0, 2))%3;

            $server = "iothttp" . (1 + $hash) . ".app";
            var_dump($server);
            if ($server != $request->getHttpHost())
            {
                return redirect(str_replace($request->getHttpHost(), $server, $request->getUri()), 301);
            }
        }
        return $next($request);
    }
}
