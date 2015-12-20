<?php

namespace App\Listeners;

use App\Events\ClassifedWasCreated;
use App\Jobs\ShareClassifiedOnTwitter;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostClassifiedOnTwitter
{
    use DispatchesJobs;

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
     * @param  ClassifedWasCreated $event
     * @return void
     */
    public function handle(ClassifedWasCreated $event)
    {
        $this->dispatch(new ShareClassifiedOnTwitter($event->classified));
    }
}
