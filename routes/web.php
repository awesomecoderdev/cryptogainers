<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\TermsAndConditionsController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\WishlistController;
/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| This is main page [index]
|--------------------------------------------------------------------------
*/
// Route::any('/', [IndexController::class, "index"])->middleware("isAdmins")->name("index");
Route::any('/', [IndexController::class, "index"])->name("index");

/*
|--------------------------------------------------------------------------
| This is pages routes
|--------------------------------------------------------------------------
*/
Route::group(["prefix" => "", "as" => "page.", "namespace" => "Page", "middleware" => []], function () {

    // faq
    Route::any('faq/', [FaqController::class, "index"])->name("faq");

    // contact-us
    Route::any('contact-us/', [ContactUsController::class, "index"])->name("contact");

    // privacy-policy
    Route::any('privacy-policy/', [PrivacyPolicyController::class, "index"])->name("privacy");

    // terms
    Route::any('terms/', [TermsAndConditionsController::class, "index"])->name("terms");

    // advertising
    Route::any('advertising/', [AdvertiseController::class, "index"])->name("advertising");
});

/*
|--------------------------------------------------------------------------
| This is news routes
|--------------------------------------------------------------------------
*/
// index
Route::any('news/{slug?}', [NewsController::class, "index"])->name("news.index");
Route::group(["prefix" => "", "as" => "news.", "namespace" => "", "middleware" => ['auth', 'verified']], function () {
    // edit
    // Route::any('edit',  [NewsController::class, "edit"])->name("edit");

    // // ckeditor uploader
    // Route::any('ckeditor/upload', [NewsController::class, "upload"])->name("ckeditor.upload");
});

/*
|--------------------------------------------------------------------------
| This is coins routes
|--------------------------------------------------------------------------
*/
Route::group(["prefix" => "", "as" => "", "namespace" => "", "middleware" => []], function () {

    // index
    // Route::any('coins/{slug?}', [CoinController::class, "index"])->name("index");
    Route::resource('coins', CoinController::class);

    Route::any('coins/chart/{coin}', [CoinController::class, "script"])->middleware("convertToJs")->name("coins.script");
});

/*
|--------------------------------------------------------------------------
| This is exchanges routes
|--------------------------------------------------------------------------
*/
Route::group(["prefix" => "", "as" => "exchanges.", "namespace" => "", "middleware" => []], function () {

    // index
    Route::any('exchanges/{slug?}', [ExchangeController::class, "index"])->name("index");
});

/*
|--------------------------------------------------------------------------
| This is exchanges page [index]
|--------------------------------------------------------------------------
    Route::any('/dashboard/{tab?}/{search?}', [DashboardController::class, "dashboard"])->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::group(["prefix" => "", "as" => "", "namespace" => "", "middleware" => ['auth', 'verified']], function () {

    // admin routes
    Route::group(["prefix" => "admin", "as" => "admin.", "namespace" => "", "middleware" => ["isAdmin"]], function () {
        // dashboard
        Route::any('/', [AdminDashboardController::class, "index"])->name('dashboard');
        // profile
        Route::any('/profile', [AdminDashboardController::class, "profile"])->name('profile');
        // settings
        Route::any('/settings', [AdminDashboardController::class, "settings"])->name('settings');
        // Community
        Route::any('/community', [AdminDashboardController::class, "community"])->name('community');

        // // news
        // Route::any('/news', [AdminDashboardController::class, "news"])->name('news');
        // // create news
        // Route::any('/news/create', [NewsController::class, "create"])->name('news.create');
        // // store news
        // Route::any('/news/store', [NewsController::class, "store"])->name('news.store');
        // // store news
        // Route::any('/news/edit/{id}', [NewsController::class, "edit"])->name('news.edit');
        // // store news
        // Route::delete('/news/delete/{id}', [NewsController::class, "destroy"])->name('news.destroy');

        Route::resource('news', AdminNewsController::class);
        Route::any('news/slug', [AdminNewsController::class, "slug"])->name("news.slug");
        Route::any('update/status', [AdminNewsController::class, "status"])->name("news.status");
        // ckeditor uploader
        Route::any('news/ckeditor/upload', [AdminNewsController::class, "upload"])->name("news.ckeditor.upload");

        // Route::any('news', function (Request $request) {
        //     $slug = SlugService::createSlug(News::class, "slug", $request->title);
        //     if ($request->isMethod('post')) {
        //         return response()->json([
        //             "success" => true,
        //             "slug" => $slug
        //         ], 200);
        //     } else {
        //         return response()->json([
        //             "success" => false,
        //             "message" => "Unauthorized Access!"
        //         ], 400);
        //     }
        // })->name("api.news");;

        // supper admin
        Route::middleware(['isSupperAdmin'])->group(function () {
            // users
            Route::any('/users', [AdminDashboardController::class, "users"])->name('users');
            // users
            Route::any('/users/new', [AdminDashboardController::class, "users"])->name('users.new');

            // admins
            Route::any('/admins', [AdminDashboardController::class, "admins"])->name('admins');
            // exchanges
            Route::any('/exchanges', [AdminDashboardController::class, "exchanges"])->name('exchanges');
            // coins
            Route::any('/coins', [AdminDashboardController::class, "coins"])->name('coins');
        });
    });

    // user routes
    Route::group(["prefix" => "profile", "as" => "user.", "namespace" => "", "middleware" => ["isUser"]], function () {
        // dashboard
        Route::any('/{tab?}/{search?}', [UserDashboardController::class, "index"])->name('dashboard.index');
    });

    // wishlist
    Route::any('wishlist/', [WishlistController::class, "index"])->name("wishlist");
});
