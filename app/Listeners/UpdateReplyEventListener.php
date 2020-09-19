<?php

namespace App\Listeners;

use App\Events\UpdateReplyEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateReplyEventListener
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
     * @param  UpdateReplyEvent  $event
     * @return void
     */
    public function handle(UpdateReplyEvent $event)
    {
        //
    }
}
