<?php

namespace App\Http\Controllers;

use DOMDocument;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $slug = null)
    {
        $trending = News::where("status", 1)->orderBy('views', 'desc')->limit(6)->get();
        // $trending = News::orderBy('views', 'desc')->whereBetween('created_at', [date('Y-m-d', strtotime('-7 days')), date("Y-m-d")])->limit(6)->get();

        if (!empty($request->input("search"))) {
            $news = News::where("status", 1)->where("title", "like", "%{$request->input("search")}%")->orderBy("created_at", "desc")->paginate(10)->onEachSide(1);

            $recent = News::where("status", 1)->orderBy("created_at", "desc")->orderBy('views', 'desc')->limit(12)->get();
            // $recent = News::orderBy("created_at", "desc")->orderBy('views', 'desc')->whereBetween('created_at', [date('Y-m-d', strtotime('-7 days')), date("Y-m-d")])->limit(12)->get();
            return view("search.news", [
                "news" => $news,
                "trending" => $trending,
                "recent" => $recent,
                "request" =>  $request->all(),
            ]);
        } else if (!empty($request->input("tag"))) {
            $news = News::where("status", 1)->whereJsonContains("tags", $request->input("tag"))->orderBy("created_at", "desc")->paginate(10)->onEachSide(1);

            $recent = News::where("status", 1)->orderBy("created_at", "desc")->orderBy('views', 'desc')->limit(12)->get();
            // $recent = News::orderBy("created_at", "desc")->orderBy('views', 'desc')->whereBetween('created_at', [date('Y-m-d', strtotime('-7 days')), date("Y-m-d")])->limit(12)->get();
            return view("news", [
                "news" => $news,
                "trending" => $trending,
                "recent" => $recent,
                "request" =>  $request->all(),
            ]);
        } else {
            if ($slug != null) {
                $news = News::where("status", 1)->where("slug", $slug)->get();

                if ($news->count()) {
                    return view("single.news", [
                        "news" => isset($news[0]) ? $news[0] : [],
                        "trending" => $trending,
                        "request" =>  $request->all(),
                    ]);
                } else {
                    return response(view('errors.404'), 404);
                }
            } else {
                $news = News::where("status", 1)->orderBy("created_at", "desc")->paginate(10)->onEachSide(1);
                // $news = DB::table("news")->simplePaginate(15);

                $recent = News::where("status", 1)->orderBy("created_at", "desc")->orderBy('views', 'desc')->limit(12)->get();
                // $recent = News::orderBy("created_at", "desc")->orderBy('views', 'desc')->whereBetween('created_at', [date('Y-m-d', strtotime('-7 days')), date("Y-m-d")])->limit(12)->get();

                return view("news", [
                    "news" => $news,
                    "trending" => $trending,
                    "recent" => $recent,
                    "request" =>  $request->all(),
                ]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize("create", News::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        $this->authorize("create", News::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, News $news)
    {
        $this->authorize("update", $news);
        echo json_encode($news::find($request->id));

        // if ($request->isMethod('post')) {

        //     $images = $this->extractImageFromContent($request->input("content"));

        //     $news = News::find($request->input("id"));
        //     $news->title = $request->input("title");
        //     $news->content = $request->input("content");
        //     $news->status = $request->input("status");
        //     $news->slug = $request->input("slug");

        //     if (!empty($images)) {
        //         $news->thumbnail = $images[0];
        //     }

        //     if ($news->save()) {
        //         return redirect()->back()->with('success', 'News successfully updated!');
        //     } else {
        //         return redirect()->back()->with('error', 'Something went wrong!');
        //     }
        // } else {
        //     return redirect()->back()->with('error', 'Something went wrong!');
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsRequest  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $this->authorize("delete", $news);


        dd($news->id);
        // delete news
        // $news->delete();

        // if ($news->delete()) {
        //     return redirect()->route("admin.news")->with('success', 'News successfully deleted!');
        // } else {
        //     return redirect()->route("admin.news")->with('error', 'Something went wrong!');
        // }
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->hasFile('upload')) {
                $unusedNewsMedia = $this->getUnusedNewsMedia();

                $originName = $request->file('upload')->getClientOriginalName();
                // $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file('upload')->getClientOriginalExtension();
                // $fileName = $fileName . '_' . time() . '.' . $extension;

                $uniqueFileName = Str::random(10) . md5(time());
                $fileName = $uniqueFileName . '.' . $extension;
                $request->file('upload')->move(public_path('media'), $fileName);
                $url = asset('media/' . $fileName);

                $unusedNewsMedia[$uniqueFileName] = $fileName;
                file_put_contents(resource_path("news/data/unused.json"), json_encode($unusedNewsMedia));

                return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function getNewsMedia()
    {
        $media = resource_path("news/data/media.json");
        if (!file_exists($media)) {
            file_put_contents(resource_path("news/data/media.json"), json_encode([]));
        }

        $data = file_get_contents($media);
        return json_decode($data, true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function getUnusedNewsMedia()
    {
        $unused = resource_path("news/data/unused.json");
        if (!file_exists($unused)) {
            file_put_contents(resource_path("news/data/unused.json"), json_encode([]));
        }
        $data = file_get_contents($unused);
        return json_decode($data, true);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function extractImageFromContent($content = null)
    {
        $output = [];
        $htmlDom = new DOMDocument();
        @$htmlDom->loadHTML($content);
        $imageTags = $htmlDom->getElementsByTagName('img');
        foreach ($imageTags as $imgTag) {
            $imgSrc = $imgTag->getAttribute('src');
            $output[] = $imgSrc;
        }
        return $output;
    }
}
