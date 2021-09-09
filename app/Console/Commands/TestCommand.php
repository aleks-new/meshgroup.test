<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestCommand extends Command {
    protected $signature = 'test';

    protected $description = 'Command description';

    public function handle() {
        \Log::debug('test cron');
    }
}
