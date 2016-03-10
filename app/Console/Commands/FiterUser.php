<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class FiterUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fiter:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'set user member field NULL when be overdue';

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
        $members = User::where('member','!=','')
                ->where('member','<',time())
                ->get();

        if (count($members) > 0) {
            foreach ($members as $member) {
                $user = User::find($member->id);
                $user->member = '';
                $user->save();
            }
        }

    }
}
