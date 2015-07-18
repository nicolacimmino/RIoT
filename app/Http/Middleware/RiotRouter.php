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
        $id = $request->get("id");
        if ($id)
        {
            $finalServer = $this->resolver->resolve($id);
            if ($finalServer != $request->getHttpHost())
            {
                return redirect(str_replace($request->getHttpHost(), $finalServer, $request->getUri()), 301);
            }
        }
        return $next($request);
    }
}
