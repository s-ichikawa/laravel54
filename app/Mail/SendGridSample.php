<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Sichikawa\LaravelSendgridDriver\SendGrid;

class SendGridSample extends Mailable
{
    use Queueable, SerializesModels, SendGrid;

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
        $pdfData = file_get_contents(__DIR__ . '/sample.pdf');
        return $this
            ->view('emails.embed_body_variable')
            ->subject('embed subject variable')
            ->from('ichikawa.shingo.0829@gmail.com', 's-ichikawa')
            ->to([
                'ichikawa.shingo.0829@gmail.com',
            ])
            ->attachData($pdfData, 'sample.pdf', [
                'mime' => 'application/pdf',
            ])
            ->sendgrid([
                'categories' => ['category1'],
            ]);
    }

}
