<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

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
            ->withSwiftMessage(function (\Swift_Message $message) {
                var_dump($message->getHeaders()->get('X-Message-Id'));
        });
    }
}
