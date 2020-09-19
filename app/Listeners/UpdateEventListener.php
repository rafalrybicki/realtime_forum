<?php

namespace App\Listeners;

use App\Events\EditReplyEvent;
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
     * @param  EditReplyEvent  $event
     * @return void
     */
    public function handle(EditReplyEvent $event)
    {
        //
    }
}
