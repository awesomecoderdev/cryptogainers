<?php

namespace App\Http\Controllers;

use App\Models\Exchange;
use App\Models\Exchanges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AutoImportController extends Controller
{

    /**
     * Import Coin list from coin gecko
     *
     * @return \Illuminate\Http\Response
     */
    public static function importCoinList()
    {
        $req = Http::get("https://jsonplaceholder.typicode.com/posts?per_page=100");
        $data = json_encode($req->json());

        // Log::info($coinList);
        Log::info("Awesomecoder cron job " . time());
    }


    /**
     * Import Exchanges list from coin gecko
     *
     * @return \Illuminate\Http\Response
     */
    public static function importExchangeList()
    {
        $data = [];
        $req = Http::get("https://api.coingecko.com/api/v3/exchanges?per_page=250&page=1");

        for ($i = 1; $i < 6; $i++) {
            $req = Http::get("https://api.coingecko.com/api/v3/exchanges?per_page=250&page=$i");
            $req = $req->json();

            if (is_array($req) && !empty($req)) {
                foreach ($req as $key => $value) {
                    $id = $value["id"];
                    $url = $value["image"];
                    $ext = substr($url, 0, strpos($url, '?'));
                    $ext = pathinfo($ext, PATHINFO_EXTENSION);

                    $img = "icon/exchanges/$id.$ext";
                    $path = public_path($img);
                    if ($url != "missing_small.png") {
                        if (file_exists($path)) {
                            $value["image"] =  asset($img);
                        } else {
                            file_put_contents($path, file_get_contents($url));
                            $value["image"] =  asset($img);
                        }
                    } else {
                        $value["image"] = asset("icon/exchanges/unknown.png");
                    }

                    $data[$id] = $value;
                }
            }
        }
        file_put_contents(resource_path("exchanges/data/exchanges.json"), json_encode($data));
    }


    /**
     * Import Exchanges list from coin gecko
     *
     * @return \Illuminate\Http\Response
     */
    public static function saveExchangeList()
    {
        $exchanges = new ExchangeController;
        $data = $exchanges->get_exchanges();
        foreach ($data as $key => $value) {
            if (Exchange::where('exchange_id', $value["id"])->exists()) {
                // update exchanges
                if ($value["trust_score_rank"] != null) {
                    $find_exchanges = Exchange::select('id', 'exchange_id')->where('exchange_id',  $value["id"])->first();
                    $slug = SlugService::createSlug(Exchange::class, "slug", $value["name"]);

                    $exchanges = Exchange::find($find_exchanges->id);
                    $exchanges->name = (isset($value["name"]) && !empty($value["name"])) ? $value["name"] : null;
                    $exchanges->exchange_id = (isset($value["id"]) && !empty($value["id"])) ? $value["id"] : null;
                    $exchanges->slug = $slug;
                    $exchanges->year_established = (isset($value["year_established"]) && !empty($value["year_established"])) ? $value["year_established"] : null;
                    $exchanges->country = (isset($value["country"]) && !empty($value["country"])) ? $value["country"] : null;
                    $exchanges->url = (isset($value["url"]) && !empty($value["url"])) ? $value["url"] : null;
                    $exchanges->image = (isset($value["image"]) && !empty($value["image"])) ? $value["image"] : null;
                    $exchanges->trust_score = (isset($value["trust_score"]) && !empty($value["trust_score"])) ? $value["trust_score"] : null;
                    $exchanges->trust_score_rank = (isset($value["trust_score_rank"]) && !empty($value["trust_score_rank"])) ? $value["trust_score_rank"] : null;
                    $exchanges->meta = (isset($value["id"]) && !empty($value["id"])) ? $value["id"] : null;

                    // update exchanges
                    $exchanges->save();
                }
            } else {
                if ($value["trust_score_rank"] != null) {
                    $slug = SlugService::createSlug(Exchange::class, "slug", $value["name"]);
                    $exchanges = new Exchange();
                    $exchanges->name = (isset($value["name"]) && !empty($value["name"])) ? $value["name"] : null;
                    $exchanges->exchange_id = (isset($value["id"]) && !empty($value["id"])) ? $value["id"] : null;
                    $exchanges->slug =  $slug;
                    $exchanges->year_established = (isset($value["year_established"]) && !empty($value["year_established"])) ? $value["year_established"] : null;
                    $exchanges->country = (isset($value["country"]) && !empty($value["country"])) ? $value["country"] : null;
                    $exchanges->url = (isset($value["url"]) && !empty($value["url"])) ? $value["url"] : null;
                    $exchanges->image = (isset($value["image"]) && !empty($value["image"])) ? $value["image"] : null;
                    $exchanges->trust_score = (isset($value["trust_score"]) && !empty($value["trust_score"])) ? $value["trust_score"] : null;
                    $exchanges->trust_score_rank = (isset($value["trust_score_rank"]) && !empty($value["trust_score_rank"])) ? $value["trust_score_rank"] : null;
                    $exchanges->meta = (isset($value["id"]) && !empty($value["id"])) ? $value["id"] : null;
                    $exchanges->save();
                }
            }
        }
    }
}
