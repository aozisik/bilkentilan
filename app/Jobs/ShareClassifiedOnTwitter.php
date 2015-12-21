<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Queue\SerializesModels;
use App\Classified;
use Twitter;


class ShareClassifiedOnTwitter extends Job implements SelfHandling
{
    use SerializesModels;

    protected $classified;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Classified $classified)
    {
        $this->classified = $classified;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $tweet = str_limit($this->classified->title, 89) . '. ';
        // add price if it exists
        if ($this->classified->price) {
            $tweet .= $this->classified->price . '₺. ';
        }
        $tweet .= route('classifieds.show', $this->classified->id);
        Twitter::postTweet(['status' => $tweet, 'format' => 'json']);
    }
}
