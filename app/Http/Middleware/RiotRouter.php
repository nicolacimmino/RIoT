<?php

namespace App\Http\Middleware;

use App\RiotResolver;
use Closure;

class RiotRouter
{
    private $resolver;

    public function __construct(RiotResolver $resolver)
    {
        $this->resolver = $resolver;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $pipe = $request->pipe;

        if ($pipe)
        {
            $finalServer = $this->resolver->resolve($pipe);
            if ($finalServer != $request->getHttpHost())
            {
                return redirect(str_replace($request->getHttpHost(), $finalServer, $request->getUri()), 307);
            }
        }
        return $next($request);
    }
}
