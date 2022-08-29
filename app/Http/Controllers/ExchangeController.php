<?php

namespace App\Http\Controllers;

use App\Models\Exchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests\StoreExchangeRequest;
use App\Http\Requests\UpdateExchangeRequest;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $slug = null)
    {

        if (!empty($request->input("search"))) {
            $exchanges = Exchange::where("name", "like", "%{$request->input("search")}%")->orderBy("trust_score_rank", "asc")->orderBy("trust_score", "desc")->paginate(50)->onEachSide(1);
            return view("exchanges", [
                "exchanges" => $exchanges,
                "request" =>  $request->all(),
            ]);
        } else {
            if ($slug != null) {
                $exchanges = Exchange::where("slug", $slug)->get();
                if ($exchanges->count()) {
                    return view("single.exchanges", [
                        "exchanges" => isset($exchanges[0]) ? $exchanges[0] : []
                    ]);
                } else {
                    return response(view('errors.404'), 404);
                }
            } else {
                $exchanges = Exchange::orderBy("trust_score_rank", "asc")->orderBy("trust_score", "desc")->paginate(50)->onEachSide(1);
                return view("exchanges", [
                    "exchanges" => $exchanges,
                    "request" =>  $request->all(),
                ]);
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_exchanges()
    {
        $exchange = resource_path("exchanges/data/exchanges.json");

        if (!file_exists($exchange) || empty($exchange)) {
            Artisan::call("import:exchanges");
        }

        $data = file_get_contents($exchange);
        return json_decode($data, true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_exchange_meta($id = null)
    {

        $exchanges = $this->get_exchanges();
        if ($id != null) {
            if (!empty($exchanges)) {
                $output = isset($exchanges[$id]) ? $exchanges[$id] : [];
            } else {
                $output = [];
            }
        } else {
            $output = [];
        }

        return json_decode(json_encode($output));
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
     * @param  \App\Http\Requests\StoreExchangeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExchangeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function show(Exchange $exchange)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function edit(Exchange $exchange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExchangeRequest  $request
     * @param  \App\Models\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExchangeRequest $request, Exchange $exchange)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exchange $exchange)
    {
        //
    }
}
