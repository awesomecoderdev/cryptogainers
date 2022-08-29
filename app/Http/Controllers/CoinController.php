<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StoreCoinRequest;
use App\Http\Requests\UpdateCoinRequest;
use App\Jobs\ProcessInsertCoins;
use App\Jobs\ProcessUpdateCoins;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

class CoinController extends Controller
{

    protected $client;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->client = new CoinGeckoClient();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Coin $coin)
    {
        // $coins = $coin::where("name", "like", "%{$request->input("search")}%")->get();

        $coinlist = $this->client->coins()->getList();
        $coinlist = array_chunk($coinlist, 300);
        ProcessInsertCoins::dispatch($coinlist[0]);

        // foreach ($coinlist as $index => $data) {
        //     ProcessInsertCoins::dispatch($coinlist[$index]);
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCoinRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoinRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coin  $coin
     * @return \Illuminate\Http\Response
     */
    public function show(Coin $coin)
    {
        $coin_id = str_replace(" ", "", strtolower($coin->slug));

        // cache min
        $min = 20;
        $content = Cache::remember("coin$coin_id", (60 * $min), function () use ($coin_id) {
            $output = $this->client->coins()->getCoin($coin_id, ['tickers' => 'false', 'market_data' => 'false']);
            return json_decode(json_encode($output));
        });

        dd($content);
        $marketChartDaily = Cache::remember("daily_chart_$coin_id", 60 * 5, function () use ($coin_id) {
            $output = $this->client->coins()->getMarketChartRange($coin_id, 'usd', strtotime('-1 day'), time());
            return json_decode(json_encode($output));
        });

        // dd($marketChartDaily);

        return view("single.coins", compact("coin", "content"));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coin  $coin
     * @return \Illuminate\Http\Response
     */
    public function script(Coin $coin)
    {
        $coin_id = str_replace(" ", "", strtolower($coin->slug));

        // $marketChartDaily = Cache::remember("daily_chart_$coin_id", 60 * 5, function () use ($coin_id) {
        //     $output = $this->client->coins()->getMarketChartRange($coin_id, 'usd', strtotime('-1 day'), time());
        //     return json_decode(json_encode($output));
        // });

        // dd($marketChartDaily);

        $contents = view('coinscript')->with('coin', $coin);
        return response($contents)->header('Content-Type', 'application/javascript');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coin  $coin
     * @return \Illuminate\Http\Response
     */
    public function edit(Coin $coin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCoinRequest  $request
     * @param  \App\Models\Coin  $coin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoinRequest $request, Coin $coin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coin  $coin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coin $coin)
    {
        //
    }
}
