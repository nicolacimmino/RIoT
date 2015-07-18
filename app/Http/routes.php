<?php
Route::group(['middleware' => 'riot.router'], function ()
{
    Route::get('pipes/{pipe}', 'PipesController@show');
    Route::post('pipes/{pipe}', 'PipesController@store');
}
);