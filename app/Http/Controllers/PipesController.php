<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;

class PipesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function show(Request $request, $pipe)
    {
        return json_encode([
                "pipe" => $pipe,
                "value" => Cache::get("Q_" . $pipe),
                "server" => $request->getHttpHost(),
            ]
        );
    }

    public function store(Request $request, $pipe)
    {
        Cache::put("Q_" . $pipe, $request->get('value'), 10);

        return json_encode([
                "pipe" => $pipe,
                "value" => Cache::get("Q_" . $pipe),
                "server" => $request->getHttpHost(),
            ]
        );
    }


}
