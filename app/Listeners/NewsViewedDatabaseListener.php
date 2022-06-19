<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\NewsViewed;

class NewsViewedDatabaseListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  App\Events\NewsViewed  $event
     * @return void
     */
    public function handle(NewsViewed $event)
    {
        $news = $event->news;
        $news->viewed_count = (int)$news->viewed_count + 1;
        $news->save();
    }
}
