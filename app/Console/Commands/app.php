<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class app extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:start';

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
        // lunch the two servers 
        $this->start_both(); 

        
    }

    public function start_both()
    {
        $this->info('<fg=yellow>Start both servers at once ..........');
        passthru('concurrently "php artisan serve" "npm run dev"');
    }

}
