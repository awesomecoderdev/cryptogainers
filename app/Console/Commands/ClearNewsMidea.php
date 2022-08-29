<?php

namespace App\Console\Commands;

use App\Models\News;
use DOMDocument;
use Illuminate\Console\Command;

class ClearNewsMidea extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:media';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove Media from public path';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $news = News::all();
        $media = [];

        foreach ($news as $key => $post) {
            $images = $this->extractImageFromContent($post->content);
            foreach ($images as $key => $image) {
                $fileName = pathinfo($image, PATHINFO_FILENAME);
                $ext = pathinfo($image, PATHINFO_EXTENSION);
                $file = "$fileName.$ext";
                $media[$fileName] = $file;
            }
        }
        file_put_contents(resource_path("news/data/media.json"), json_encode($media));

        $usedMedia = !empty($this->getNewsMedia()) ?  $this->getNewsMedia() : [];
        $unusedMedia = !empty($this->getUnusedNewsMedia()) ?  $this->getUnusedNewsMedia() : [];
        $uniqueMedia = array_diff($unusedMedia, $usedMedia);

        foreach ($uniqueMedia as $key => $media) {
            if (unlink(public_path("media/$media"))) {
                if (isset($unusedMedia[$key])) {
                    unset($unusedMedia[$key]);
                }
            }
        }
        file_put_contents(resource_path("news/data/unused.json"), json_encode($unusedMedia));
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
