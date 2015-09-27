<?php namespace App\Http\Middleware\RIoT;

use App\RIoT\Authorizations\K1ResourceAuthorization;
use App\RIoT\Keys\K1;
use App\RIoT\MessagingResources\MessagingResource;
use Closure;
use Illuminate\Http\Request;

class K1ResourceAuthorizationMiddleware
{
    /**
     * @var K1
     */
    private $k1;
    /**
     * @var MessagingResource
     */
    private $resource;
    /**
     * @var K1ResourceAuthorization
     */
    private $authorization;

    public function __construct(K1 $k1, MessagingResource $resource, K1ResourceAuthorization $authorization)
    {
        $this->k1 = $k1;
        $this->resource = $resource;
        $this->authorization = $authorization;
    }

    public function handle(Request $request, Closure $next)
    {
        $this->authorization->authorize($this->resource, $this->k1);

        return $next($request);
    }
}