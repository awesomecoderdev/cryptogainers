<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // // factorey
        // $faker = \Faker\Factory::create();
        // $name = $faker->name;


        // // insert fake data
        // DB::table('coins')->insert([
        //     "name" => $name,
        //     "title" => "{$name} Live Price",
        //     "symbol" => strtoupper(substr($name, 0, 3)),
        //     "slug" => $name,
        //     "icon" => $name,
        //     "content" => $faker->text,
        //     "rank" => $faker->numberBetween(1, 100),
        //     "coin_id" => "bitcoin-btc",
        // ]);
    }
}
