<?php namespace App\Http\Middleware\RIoT;

use app\Exceptions\InvalidNuggetException;
use Symfony\Component\HttpFoundation\Request;

abstract class NuggetValidator
{

    /**
     * @param Request $request
     * @param string $nuggetParameter
     * @param string $dataParameter
     * @throws InvalidNuggetException
     */
    public function handle(Request $request, $nuggetParameter = "nugget", $dataParameter = "data")
    {
        $nugget = $request->get($nuggetParameter);
        $data = $request->get($dataParameter);

        $nugget = new Nugget();
        $nugget->validate($nugget, $data);

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