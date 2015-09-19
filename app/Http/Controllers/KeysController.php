<?php namespace App\Http\Controllers;

use App\RIoT\MessagingResources\MessagingResource;
use App\RIoT\MessagingResources\Slot;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;


class KeysController extends ApiController
{
    public function show(Request $request, MessagingResource $slot)
    {
        return response("Placeholder for keys for slot: " . $slot->getResourceId())->header("Content-Type", "text/json");
    }
}
