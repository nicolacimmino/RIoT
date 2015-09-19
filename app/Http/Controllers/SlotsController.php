<?php namespace App\Http\Controllers;

use App\RIoT\MessagingResources\Slot;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;


class SlotsController extends ApiController
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
     * @param Slot $slot
     * @return Response
     * @internal param $slotId
     */
    public function show(Request $request, Slot $slot)
    {

        if($request->get("web"))
        {
            return view("slot", (array)json_decode($slot->getMessage()));
        }

        return response($slot->getMessage())->header("Content-Type", "text/json");
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
    public function store(Request $request, Slot $slot)
    {
        $value = $request->get('value');

        $slot->addMessage($value);

        return response("")->header("Content-Type", "text/json");
    }


}
