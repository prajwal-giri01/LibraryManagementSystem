<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserHasMembership;
use Carbon\Carbon;

class CheckMembership extends Command
{
    // The name and signature of the console command
    protected $signature = 'membership:check';

    // The console command description
    protected $description = 'Check membership statuses and update them accordingly';

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


        return 0;
    }
}
