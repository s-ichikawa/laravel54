<?php

namespace App\Listeners;

use App\Events\SomeEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Swift_Events_EventListener;

class MailEventListener implements Swift_Events_EventListener
{
    public function sendPerformed(\Swift_Events_SendEvent $event)
    {
        $message = $event->getMessage();
        var_dump($message->getHeaders()->get('X-Message-Id')->toString());
    }
}
