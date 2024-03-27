<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ShortOptimize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'c:p';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('optimize');
        $this->info('Optimizing route and configs');
        $this->call('config:clear');
        $this->info('Clearing catche');
    }
}
