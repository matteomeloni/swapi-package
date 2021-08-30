<?php

namespace Matteomeloni\Swapi\Commands;

use Illuminate\Console\Command;
use Matteomeloni\Swapi\Swapi;

class RetrieveSwapiData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swapi:retrieve-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve People and Planet data from SWAPI';

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
        $this->warn('Starting Retrieve Data');

        Swapi::getPeople();

        $this->info('Retrieve Data Completed');
    }
}
