<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreK2Request;
use App\RIoT\MessagingResources\MessagingResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class KeysController extends ApiController
{
    public function retrieveK2(Request $request, MessagingResource $resource)
    {
        return response(Cache::get("K2_SLOT_" . $resource->getResourceId()))->header("Content-Type", "text/json");
    }

    public function installK2(StoreK2Request $request, MessagingResource $resource)
    {
        // TODO: this cannot be hardcoded, depends on resource type
        // Also make sure that by injecting a crafted resource id it won't be possible to override other keys!
        Cache::put("K2_SLOT_" . $resource->getResourceId(), $request->k2->toJson(), 0);

        return response(null, 204);
    }
}
