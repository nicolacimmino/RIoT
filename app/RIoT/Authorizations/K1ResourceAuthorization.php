<?php namespace app\RIoT\Authorizations;

use App\Exceptions\UnauthorizedException;
use App\RIoT\Keys\K1;
use App\RIoT\MessagingResources\MessagingResource;

class K1ResourceAuthorization {

    public function authorize(MessagingResource $resource, K1 $k1)
    {
        if(hash("sha256", $k1->secret) !== $resource->getResourceId())
        {
            throw new UnauthorizedException();
        }
    }
}