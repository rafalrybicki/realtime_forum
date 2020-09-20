<?php

namespace App\Listeners;

use App\Events\DeleteQuestionEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeleteQuestionEventListener
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
     * @param  DeleteQuestionEvent  $event
     * @return void
     */
    public function handle(DeleteQuestionEvent $event)
    {
        //
    }
}
