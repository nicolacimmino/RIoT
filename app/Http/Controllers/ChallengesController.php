<?php namespace App\Http\Controllers;

use App\RIoT\RiotChallenge;
use Illuminate\Http\Request;

class ChallengesController extends ApiController {

    public function show(Request $request, $slotId, RiotChallenge $challenge)
    {
        return $challenge->get($slotId);
    }
}