<?php

namespace App\Console\Commands;

use App\Notifications\InvoicePaid;
use App\User;
use Illuminate\Console\Command;

class NotificationSample extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:sample';

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
        $user = new User([
            'name'     => 's-ichikawa',
            'email'    => 'ichikawa.shingo.0829@gmail.com',
            'password' => 'aaaa',
        ]);
        $user->notify(new InvoicePaid());

    }
}
