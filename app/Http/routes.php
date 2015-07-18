<?php
Route::group(['middleware' => 'riot.router'], function ()
{
    Route::get('pipes', 'PipesController@index');
}
);