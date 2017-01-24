<?php

namespace App\Console\Commands;

use App\Mail\SendGridSample;
use Illuminate\Console\Command;
use Illuminate\Mail\Message;

class SendgridMailSample extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendgrid:sample';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $cid = uniqid();
        \Mail::send('emails.embed_body_variable', ['cid' => $cid], function (Message $message) use ($cid) {
            $message
                ->subject('embed subject variable')
                ->from('ichikawa.shingo.0829@gmail.com', 's-ichikawa')
                ->to([
                    'ichikawa.shingo.0829@gmail.com',
                ])
                ->replyTo('ichikawa.shingo.0829+replyto@gmail.com', 's-ichikawa！')
                ->embedData([
                    'attachments' => [
                        [
                            'content'     => base64_encode(file_get_contents(resource_path('video/SampleVideo.mp4'))),
                            'type'        => 'video/mp4',
                            'filename'    => 'SampleVideo.mp4',
                            'disposition' => 'inline',
                            'content_id'  => $cid
                        ],
                    ],
                ], 'sendgrid/x-smtpapi');
        });
    }
}
