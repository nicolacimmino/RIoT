<?php namespace App\Http\Middleware\RIoT;


use App\Http\Requests\Request;
use App\RIoT\K1;
use Closure;

class K1Validator
{

    public function handle(Request $request, Closure $next, K1 $k1)
    {
        $request->
        return $next($request);
    }
}