<?php
Route::group(['middleware' => 'dht.router'], function ()
{
    Route::get('pipes', 'PipesController@index');
}
);