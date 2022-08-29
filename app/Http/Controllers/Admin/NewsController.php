<?php

namespace App\Http\Controllers\Admin;

use DOMDocument;
use App\Models\Coin;
use App\Models\News;
use App\Models\User;
use Cocur\Slugify\Slugify;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Auth $user)
    {
        $news = News::orderBy("created_at", "desc")->paginate(10)->onEachSide(1);
        return view("dashboard.admin.page.news", [
            "user" => $user::user(),
            "news" => $news,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function slug(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->edit == null) {
                $slug = SlugService::createSlug(News::class, "slug", $request->title);
                return response()->json([
                    "success" => true,
                    "slug" => $slug,
                ], 200);
            } else {
                $oldSlug = $request->edit;
                $slugGenerator = new Slugify();
                $currentSlug = $slugGenerator->slugify($request->title);
                if ($oldSlug == $currentSlug) {
                    $slug = $oldSlug;
                } else {
                    $slug = SlugService::createSlug(News::class, "slug", $request->title);
                }

                return response()->json([
                    "success" => true,
                    "slug" => $slug,
                ], 200);
            }
        } else {
            return response()->json([
                "success" => false,
                "message" => "Unauthorized Access!"
            ], 400);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        // dd($request->all());

        if ($request->status != null) {
            foreach ($request->status as $id => $status) {
                $news = News::findOrFail($id);
                $news->status = $request->action;
                $news->save();
            }
            return redirect()->route("admin.news.index")->with("success", "News successfully updated!");
        } else {
            return redirect()->route("admin.news.index")->with("error", "Something went wrong!");
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies("create"), Response::HTTP_FORBIDDEN);
        return view("dashboard.admin.edit.new-news");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        abort_if(Gate::denies("delete"), Response::HTTP_FORBIDDEN);
        // dd($request->all());

        $images = $this->extractImageFromContent($request->content);
        $thumbnail = isset($images[0]) ? $images[0] : NULL;

        $slugGenerator = new Slugify();

        $create =  [
            "title" => $request->title,
            "slug" =>  $slugGenerator->slugify($request->slug),
            "description" => $request->description,
            "keywords" => $request->keywords,
            "content" => $request->content,
            "thumbnail" => $thumbnail
        ];

        // update news
        $news = News::create($create);

        // dd($request->all());

        return redirect()->route("admin.news.edit", $news)->with("success", "News Successfully Created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return redirect()->route("admin.news.index")->with("error", "Invalid News!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies("update"), Response::HTTP_FORBIDDEN);
        $news = News::findOrFail($id);
        return view("dashboard.admin.edit.news", compact("news"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsRequest  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $news, $id)
    {
        abort_if(Gate::denies("update"), Response::HTTP_FORBIDDEN);
        $news = News::findOrFail($id);
        $images = $this->extractImageFromContent($request->content);
        $thumbnail = isset($images[0]) ? $images[0] : NULL;

        $slugGenerator = new Slugify();
        $slug = $slugGenerator->slugify($request->slug);

        // check slug exist with another news
        $haveNews = News::whereSlug($slug)->first();

        $update =  [
            "title" => $request->title,
            "slug" => $slug,
            "description" => $request->description,
            "keywords" => $request->keywords,
            "content" => $request->content,
            "thumbnail" => $thumbnail
        ];

        if ($haveNews == null || $haveNews->id == $id) {
            // update news
            $news->update($update);
        } else {
            // show error news
            return redirect()->route("admin.news.edit", $news)->withInput()->withErrors(['slug' => "\"$slug\" slug has already been taken."]);
        }

        return redirect()->route("admin.news.edit", $news)->with("success", "News Successfully Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies("delete"), Response::HTTP_FORBIDDEN);
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->route("admin.news.index")->with("success", "News Successfully Deleted!");
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
