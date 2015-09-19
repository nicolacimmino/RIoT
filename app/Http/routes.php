<?php use Illuminate\Support\Facades\Route;

Route::group(
    ['prefix'     => 'slots',
     'middleware' => ['riot.router', 'riot.resource']],
    function ()
    {
        Route::get('{slot}', 'SlotsController@show');
        Route::post('{slot}', 'SlotsController@store');
        Route::get('{slot}/challenges', 'ChallengesController@show');
    }
);

