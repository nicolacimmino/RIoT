<?php use Illuminate\Support\Facades\Route;

Route::group(
    ['prefix'     => 'slots',
     'middleware' => ['riot.router', 'riot.resource', 'riot.keys']],
    function ()
    {
        Route::get('{slot}', 'ResourcesController@show');
        Route::post('{slot}', 'ResourcesController@store');

        // These routes require K1
        Route::group(
             ['middleware' => ['riot.k1']],
            function ()
            {
                Route::get('{slot}/keys/k2', 'KeysController@retrieveK2');
                Route::put('{slot}/keys/k2', 'KeysController@installK2');
            }
        );
    }
);

