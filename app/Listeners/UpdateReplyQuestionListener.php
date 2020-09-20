<?php

namespace App\Listeners;

use App\Events\UpdateQuestionEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateReplyQuestionListener
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
     * @param  UpdateQuestionEvent  $event
     * @return void
     */
    public function handle(UpdateQuestionEvent $event)
    {
        //
    }
}
