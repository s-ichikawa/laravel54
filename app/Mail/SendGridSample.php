<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Message;
use Illuminate\Queue\SerializesModels;

class SendGridSample extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('emails.embed_body_variable')
            ->subject('embed subject variable')
            ->from('ichikawa.shingo.0829@gmail.com', 's-ichikawa')
            ->to([
                'ichikawa.shingo.0829@gmail.com',
            ])
            ->withSwiftMessage(function (Message\SendGridMessage $message) {
                $message->setApi(['test']);
                var_dump($message->getHeaders()->getAll('X-Message-Id'));
            });
    }

}
