<?php namespace App\Http\Middleware\RIoT;

use Closure;
use Symfony\Component\HttpFoundation\Request;

abstract class NuggetValidator
{

    /**
     * @param Request $request
     * @param Closure $next
     * @param string $nuggetParameter
     * @param string $dataParameter
     * @return
     */
    public function handle(Request $request, Closure $next, $nuggetParameter = "nugget", $dataParameter = "data")
    {
        $nugget = $request->get($nuggetParameter);
        $data = $request->get($dataParameter);

        $nugget = new Nugget();
        $nugget->validate($nugget, $data);

        return $next($request);
    }

    /**
     * Get the nugget element identifier.
     *
     * @return String
     */
    public abstract function getElement();

    /**
     * Get the amount of leading zeros for this nugget type.
     *
     * @return mixed
     */
    public abstract function getNuggetLeadingZeros();
}