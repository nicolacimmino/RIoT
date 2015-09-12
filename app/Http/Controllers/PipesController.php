<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;


class PipesController extends ApiController
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
     * @return Response
     */
    public function show(Request $request, $pipe)
    {
        if($request->get("web"))
        {
            return view("pipe", (array)json_decode(Cache::get("Q_" . $pipe)));
        }

        return response(json_encode([
                "pipe" => $pipe,
                "value" => json_decode(Cache::get("Q_" . $pipe)),
                "server" => $request->getHttpHost(),
            ]
        ))->header("Content-Type", "text/json");
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
     * @param $pipe
     * @return string
     */
    public function store(Request $request, $pipe)
    {
        $value = json_decode($request->get('value'));
        $value->timestamp = gmdate("Y-m-d H:i:s");

        Cache::put("Q_" . $pipe, json_encode($value) , 10);

        return response(json_encode([
                "pipe" => $pipe,
                "value" => json_decode(Cache::get("Q_" . $pipe)),
                "server" => $request->getHttpHost(),
            ]
        ))->header("Content-Type", "text/json");
    }


}
