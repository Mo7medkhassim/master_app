<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class notifyEmal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email ever day to user';

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
     * @return int
     */
    public function handle()
    {
        $users = User::where('status', 0)->get();
        foreach($users as $user ) {
            $user -> update(['status' => 1]);
        }
    }
}
