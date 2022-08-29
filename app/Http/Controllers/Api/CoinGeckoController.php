<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;


class CoinGeckoController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $coin_id = $request->coin != null ? $request->coin : "null";

        // cache min
        $min = 1;
        $result = Cache::remember("coin$coin_id", (60 * $min), function () use ($coin_id) {
            $client = new CoinGeckoClient();
            return $client->coins()->getCoin($coin_id, ['tickers' => 'false', 'market_data' => 'false']);
        });

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function market(Request $request)
    {
        $coin_id = $request->coin != null ? $request->coin : "null";
        $currency = $request->currency != null ? $request->currency : "usd";
        $day = $request->day != null ? $request->day : "max";

        // cache min
        $min = 1;
        $result = Cache::remember("market$coin_id$currency$day", (60 * $min), function () use ($coin_id, $currency, $day) {
            $client = new CoinGeckoClient();
            return $client->coins()->getMarketChart($coin_id, $currency, $day);
        });

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tickers(Request $request)
    {
        $coin_id = $request->coin != null ? $request->coin : "null";

        // cache min
        $min = 1;
        $result = Cache::remember("getTickers$coin_id", (60 * $min), function () use ($coin_id) {
            $client = new CoinGeckoClient();
            return $client->coins()->getTickers($coin_id);
        });

        return $result;
    }
}
