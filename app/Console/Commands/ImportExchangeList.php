<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\AutoImportController;

class ImportExchangeList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:exchanges';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import excnhages list from coingecko';

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
        AutoImportController::importExchangeList();
    }
}
