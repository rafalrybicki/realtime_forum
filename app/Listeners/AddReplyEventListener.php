<?php

namespace App\Listeners;

use App\Events\AddReplyEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddReplyEventListener
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
     * @param  AddReplyEvent  $event
     * @return void
     */
    public function handle(AddReplyEvent $event)
    {
        //
    }
}
