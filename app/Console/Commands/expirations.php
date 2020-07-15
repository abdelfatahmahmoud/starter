<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class expirations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expire to loding evry 5 minute automatically';

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
        $Usres =  User::where('status',0) -> get() ;

        foreach ($Usres as $user){

            $user -> update(['status' => 1]);
    }
    }
}
