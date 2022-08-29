<?php

namespace Database\Seeders;

use App\Models\Coin;
use App\Models\News;
use Illuminate\Database\Seeder;
use Database\Seeders\CoinSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Coin::factory(250)->create();
        \App\Models\News::factory(250)->create();
        // $this->call([
        //     CoinSeeder::class
        // ]);
    }
}
