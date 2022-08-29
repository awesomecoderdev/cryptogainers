<?php

namespace App\Console\Commands;

use App\Http\Controllers\AutoImportController;
use Illuminate\Console\Command;

class SaveExchangeList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:exchanges';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update exchanges from json to database';

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
        AutoImportController::saveExchangeList();
    }
}
