<?php namespace app\Http\Middleware\RIoT;

use App\RIoT\MessagingResources\MessagingResource;
use Closure;
use Illuminate\Http\Request;

class ResourceResolver
{

    /**
     * @param Request $request
     * @param callable $next
     */
    public function handle(Request $request, Closure $next)
    {
        foreach ($request->route()->parameters() as $parameterName => $resourceId)
        {
            $resourceClassName = ucfirst($parameterName);

            if (!is_subclass_of($resourceClassName, MessagingResource::class))
            {
                continue;
            }

            $resourceInstance = new $resourceClassName($resourceId);

            $request->route()->setParameter($parameterName, $resourceInstance);
        }

        return $next($request);
    }
}