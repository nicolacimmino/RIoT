<?php namespace App\Http\Requests;

use App\RIoT\Keys\K2;
use Illuminate\Support\Facades\Request;

class StoreK2Request extends Request
{

    /**
     * @var K2
     */
    public $k2;

    public function __construct()
    {
        $k2Data = Request::getContent();
        $this->k2 = new K2($k2Data);
    }
}