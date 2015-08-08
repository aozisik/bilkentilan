<?php

namespace App\Listeners;

use App\Events\ClassifedWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Twitter;

class PostClassifiedOnTwitter
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
     * @param  ClassifedWasCreated  $event
     * @return void
     */
    public function handle(ClassifedWasCreated $event)
    {
        $classified = $event->classified;

        $tweet  = str_limit($classified->title, 89).'. ';
        // add price if it exists
        if($classified->price) {
            $tweet .= $classified->price.'₺. ';
        }
        $tweet .= route('classifieds.show', $classified->id);
        Twitter::postTweet(['status' => $tweet, 'format' => 'json']);
    }
}
