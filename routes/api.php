<?php

use App\Http\Controllers\Api\CoinGeckoController;
use App\Http\Controllers\Coins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Coin;
use App\Models\News;
use Cviebrock\EloquentSluggable\Services\SlugService;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
|--------------------------------------------------------------------------
| This is eqample request
|--------------------------------------------------------------------------
*/

Route::get("json", function (Request $request) {
    $headers = [];

    $data = [
        "success" => true,
        "message" => "Successflly requested!"
    ];
    // $data = Coin::all();
    $host = $request->header("host");
    if ($host == "127.0.0.1:8000") {
        $data = $request->header();
    } else {
        $data = [
            "success" => false,
            "message" => "Successflly requested!"
        ];
    }
    return response()->json($data, 200, $headers);
});


/*
|--------------------------------------------------------------------------
| This is eqample request
|--------------------------------------------------------------------------
*/
Route::post("json", function (Request $request) {
    $headers = [];

    $data = [
        "success" => true,
        "message" => "Successflly requested!"
    ];
    // $data = Coin::all();
    $host = $request->header("host");
    if ($host == "127.0.0.1:8000") {
        $data = $request->header();
    } else {
        $data = [
            "success" => false,
            "message" => "Successflly requested!"
        ];
    }
    return response()->json($data, 200, $headers);
});

Route::any('news', function (Request $request) {
    $slug = SlugService::createSlug(News::class, "slug", $request->title);
    if ($request->isMethod('post')) {
        return response()->json([
            "success" => true,
            "slug" => $slug
        ], 200);
    } else {
        return response()->json([
            "success" => false,
            "message" => "Unauthorized Access!"
        ], 400);
    }
})->name("api.news");;

/*
|--------------------------------------------------------------------------
| This is user auth
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




/*
|--------------------------------------------------------------------------
| This is CoinGecko API
|--------------------------------------------------------------------------
*/
Route::get('coingecko', [CoinGeckoController::class, "index"])->name("coingecko.index");
Route::get('coingecko/market', [CoinGeckoController::class, "market"])->name("coingecko.market");
Route::get('coingecko/tickers', [CoinGeckoController::class, "tickers"])->name("coingecko.tickers");
