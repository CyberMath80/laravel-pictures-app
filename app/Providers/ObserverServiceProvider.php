<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Photo;
use App\Models\Vote;
use App\Observers\PhotoObserver;
use App\Observers\VoteObserver;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Photo::observe(PhotoObserver::class);
        Vote::observe(VoteObserver::class);
    }
}
