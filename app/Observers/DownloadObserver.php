<?php

namespace App\Observers;

use App\Models\Download;
use Cache;

class DownloadObserver
{
    /**
     * Handle the Download "created" event.
     *
     * @param  \App\Models\Download  $download
     * @return void
     */
    public function created(Download $download)
    {
        Cache::flush();
    }

    /**
     * Handle the Download "updated" event.
     *
     * @param  \App\Models\Download  $download
     * @return void
     */
    public function updated(Download $download)
    {
        Cache::flush();
    }

    /**
     * Handle the Download "deleted" event.
     *
     * @param  \App\Models\Download  $download
     * @return void
     */
    public function deleted(Download $download)
    {
        Cache::flush();
    }

    /**
     * Handle the Download "restored" event.
     *
     * @param  \App\Models\Download  $download
     * @return void
     */
    public function restored(Download $download)
    {
        //
    }

    /**
     * Handle the Download "force deleted" event.
     *
     * @param  \App\Models\Download  $download
     * @return void
     */
    public function forceDeleted(Download $download)
    {
        //
    }
}
