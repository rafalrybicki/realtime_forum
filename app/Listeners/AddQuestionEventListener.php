<?php

namespace App\Listeners;

use App\Events\AddQuestionEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddQuestionEventListener
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
     * @param  AddQuestionEvent  $event
     * @return void
     */
    public function handle(AddQuestionEvent $event)
    {
        //
    }
}
