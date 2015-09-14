<?php
Route::group(['middleware' => 'riot.router'], function ()
{
    Route::get('slots/{slot}', 'SlotsController@show');
    Route::post('slots/{slot}', 'SlotsController@store');
}
);