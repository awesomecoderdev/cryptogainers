<?php

namespace App\Jobs;

use App\Models\Coin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessInsertCoins implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $coinlist;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($coinlist)
    {
        $this->coinlist = $coinlist;

        // dd($this->coinlist);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->coinlist as $key => $value) {
            $create = [];
            $create["coin_id"] = $value["id"];
            $create["name"] = $value["name"];
            $create["symbol"] = $value["symbol"];

            Coin::updateOrCreate([
                "coin_id" => $value["id"]
            ], $create);
        }
    }
}
