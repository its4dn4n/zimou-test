<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class app_setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup';

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
        // php migrate , seeders  
        $this->migrate(); 
        $this->fill_data(); 

    }
    public function migrate()
    {
        $this->info('<fg=yellow>Start migration ..........');
        passthru('php artisan migrate:fresh');
        $this->info('<fg=green>Migration successfully completed');
    }
    public function fill_data()
    {
        $this->info('<fg=yellow>Start filling data ..........');
        passthru('php artisan db:seed --class=WilayaSeeder');
        passthru('php artisan db:seed --class=CommuneSeeder');
        passthru('php artisan db:seed --class=DeliveryTypeSeeder');
        passthru('php artisan db:seed --class=PackageStatusSeeder');
        passthru('php artisan db:seed --class=StorePackageSeeder');
        $this->info('<fg=green>Filling data successfully completed');
    }
}
