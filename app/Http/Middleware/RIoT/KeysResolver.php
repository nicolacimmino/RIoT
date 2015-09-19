<?php namespace App\Http\Middleware\RIoT;

use App\RIoT\Keys\K;
use App\RIoT\Keys\K1;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class KeysResolver
{

    /**
     * @param Request $request
     * @param callable $next
     */
    public function handle(Request $request, Closure $next)
    {
        foreach ($request->all() as $parameterName => $value)
        {
            $keyClass = ucfirst($parameterName);

            if (!is_subclass_of($keyClass, K::class))
            {
                continue;
            }

            $keyInstance = new $keyClass($value);

            App::singleton(K1::class, function () use ($keyInstance)
            {
                return $keyInstance;
            });

        }

        return $next($request);
    }
}