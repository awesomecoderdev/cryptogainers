<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view("dashboard.admin.index");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request, User $user)
    {
        return view("dashboard.admin.page.profile");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users(Request $request, User $user)
    {
        return view("dashboard.admin.page.users");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admins(Request $request, User $user)
    {
        return view("dashboard.admin.page.admins");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings(Request $request, User $user)
    {
        return view("dashboard.admin.page.settings");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function news(Request $request, Auth $user)
    {
        $news = News::where("status", 1)->orderBy("created_at", "desc")->paginate(10)->onEachSide(1);

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
    public function coins(Request $request, User $user)
    {
        return view("dashboard.admin.page.coins");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function exchanges(Request $request, User $user)
    {
        return view("dashboard.admin.page.exchanges");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function community(Request $request, User $user)
    {
        return view("dashboard.admin.page.comunity");
    }
}
