<?php namespace App\Http\Controllers;

use App\RIoT\MessagingResources\MessagingResource;
use App\RIoT\MessagingResources\Slot;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;


class ResourcesController extends ApiController
{
    /**
     * @api {get} /pipes/:id Read the pipe content
     * @apiName ReadPipe
     * @apiGroup Pipes
     *
     * @apiParam {Number} id Pipe unique ID.
     *
     * @apiSuccess {String} JSON content
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "pipe": 123
     *       "value": "Test message",
     *       "server": "iot3.test.com"
     *     }
     *
     */
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param Slot $resource
     * @return Response
     * @internal param $slotId
     */
    public function show(Request $request, MessagingResource $resource)
    {

        if($request->get("web"))
        {
            return view("slot", (array)json_decode($resource->getMessage()));
        }

        return response($resource->getMessage())->header("Content-Type", "text/json");
    }

    /**
     * @api {post} /pipes/:id Write the pipe content
     * @apiName WritePipe
     * @apiGroup Pipes
     *
     * @apiParam {Number} id Pipe unique ID.
     * @apiParam {String} value Pipe content to write
     *
     * @apiSuccess {String} JSON content
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "pipe": 123
     *       "value": "Test message",
     *       "server": "iot3.test.com"
     *     }
     *
     */
    /**
     * @param Request $request
     * @param $slotId
     * @return string
     * @internal param $pipe
     */
    public function store(Request $request, MessagingResource $resource)
    {
        $value = $request->get('value');

        $resource->addMessage($value);

        return response("")->header("Content-Type", "text/json");
    }


}
