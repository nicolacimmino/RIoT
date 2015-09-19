<?php
/**
 * Created by PhpStorm.
 * User: nicola
 * Date: 18/07/2015
 * Time: 14:08
 */

namespace App\Providers;


use App\RiotResolver;
use Illuminate\Support\ServiceProvider;

class RiotChallengeProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\RiotChallenge', function ($app) {
            return new RiotChallenge();
        });
    }
}