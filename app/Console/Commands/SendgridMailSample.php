<?php

namespace App\Console\Commands;

use App\Listeners\MailEventListener;
use App\Mail\SendGridSample;
use Illuminate\Console\Command;
use Illuminate\Mail\Message;
use Mail;

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
//        event(new SendMail());
//        Mail::send(new SendGridSample());
        Mail::getSwiftMailer()->registerPlugin(new MailEventListener());
        \Mail::send(['emails.embed_body_variable', 'emails.phpcon'], [], function (Message $message) {
            $message
                ->subject('embed subject variable')
                ->from('ichikawa.shingo.0829@gmail.com', 's-ichikawa')
                ->to([
                    'ichikawa.shingo.0829@gmail.com',
                ])
                ->replyTo('ichikawa.shingo.0829+replyto@gmail.com', 's-ichikawa！')
                ->embedData(json_encode([
                    'personalizations' => [
                        [
                            'substitutions' => [
                                ':myname' => 's-ichikawa',
                            ],
                        ],
                    ],
                    'categories'       => ['category2'],
                ]), 'sendgrid/x-smtpapi');
        });
    }
}
