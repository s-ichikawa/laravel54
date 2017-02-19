<?php

namespace App\Listeners;

use App\Events\send_mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailListener
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
     * @param  send_mail  $event
     * @return void
     */
    public function handle(send_mail $event)
    {
        //
    }
}
