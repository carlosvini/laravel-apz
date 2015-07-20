<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class DbTruncate extends Command
{

    protected $signature = 'db:truncate';


    protected $description = 'Truncate tables on testing environment.';

    public function handle()
    {
        if (!\App::environment('testing')) {
            echo 'Truncate aborted. You are not on a testing environment.';
            return;
        }
        $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();

        foreach ($tables as $name) {
            //if you don't want to truncate migrations
            if ($name == 'migrations') {
                continue;
            }
            DB::table($name)->truncate();
        }
    }
}
