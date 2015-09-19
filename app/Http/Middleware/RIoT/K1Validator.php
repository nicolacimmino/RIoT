<?php namespace App\Http\Middleware\RIoT;

use App\RIoT\Keys\K1;
use App\RIoT\MessagingResources\MessagingResource;
use Closure;
use Illuminate\Http\Request;

class K1Validator
{
    /**
     * @var K1
     */
    private $k1;
    /**
     * @var MessagingResource
     */
    private $resource;

    public function __construct(K1 $k1, MessagingResource $resource)
    {

        $this->k1 = $k1;
        $this->resource = $resource;
    }
    public function handle(Request $request, Closure $next)
    {
        $this->k1->validate($this->resource->getResourceId());
        return $next($request);
    }
}