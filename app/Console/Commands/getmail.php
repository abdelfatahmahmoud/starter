<?php

namespace App\Console\Commands;

use App\Mail\fetchemail;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class getmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:msg';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send message after 30days';

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
        $mails = User::pluck('email')->toArray() ;  // pluck this forward the email to array

        $data = ['title' => 'programing' , 'body' => 'laravel'];
          foreach ($mails as $mail){

              Mail::To($mail) ->send(new fetchemail($data));

           // Mail::To($mail) -> send(new fetchemail($data));

        }
    }
}
