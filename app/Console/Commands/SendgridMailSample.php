<?php

namespace App\Console\Commands;

use App\Events\SendMail;
use App\Mail\SendGridSample;
use Illuminate\Console\Command;
use Illuminate\Mail\Message;
use Sichikawa\LaravelSendgridDriver\SendGridMessage;

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
//        $result = \Mail::to('ichikawa.shingo.0829@gmail.com')->send(new SendGridSample());
        \Mail::send('emails.embed_body_variable', [], function (Message $message) {
            $message
                ->subject('embed subject variable')
                ->from('ichikawa.shingo.0829@gmail.com', 's-ichikawa')
                ->to([
                    'ichikawa.shingo.0829@gmail.com',
                ])
                ->replyTo('ichikawa.shingo.0829+replyto@gmail.com', 's-ichikawa！')
                ->api([
                    'personalizations' => [
                        [
                            'substitutions' => [
                                ':myname' => 's-ichikawa',
                            ],
                        ],
                    ],
                    'template_id'      => config('sendgrid.templates.sample'),
                    'asm'              => [
                        'group_id' => 5221,
                        'groups_to_display' => [
                            5221
                        ]
                    ],
                ], 'sendgrid/x-smtpapi');
        });
    }
}
