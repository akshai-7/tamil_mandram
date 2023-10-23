<?php

use App\Http\Controllers\API\BylawController;
use App\Http\Controllers\API\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\ExecutiveCommitteeController;
use App\Http\Controllers\API\HistoryController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\NotificationController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\SponsorController;
use App\Http\Controllers\API\YouthCommitteeController;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});



Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/color-setting', [ProfileController::class, 'colorSetting'])->name('login');
    Route::get('/logout', [LoginController::class, 'logout']);

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::post('/event-list', [EventController::class, 'index'])->name('event-list');
    Route::post('/event-view', [EventController::class, 'view'])->name('event-view');
    Route::post('/native-language-menu', [ProfileController::class, 'nativeLanguageMenu'])->name('native-language-menu');

    Route::post('/executive-committee-list', [ExecutiveCommitteeController::class, 'index'])->name('executive-committee-list');
    Route::post('/executive-committee-view', [ExecutiveCommitteeController::class, 'view'])->name('executive-committee-view');

    Route::post('/youth-committee-list', [YouthCommitteeController::class, 'index'])->name('executive-committee-list');
    Route::post('/youth-committee-view', [YouthCommitteeController::class, 'view'])->name('executive-committee-view');

    Route::get('/by-law-list', [BylawController::class, 'index'])->name('by-law-list');
    Route::post('/by-law-view', [BylawController::class, 'view'])->name('by-law-view');

    Route::get('/news-list', [NewsController::class, 'index'])->name('news-list');
    Route::post('/news-view', [NewsController::class, 'view'])->name('news-view');

    Route::get('/history', [HistoryController::class, 'index'])->name('history');

    Route::get('/sponsor-categories-name-list', [SponsorController::class, 'index'])->name('sponsor-categories-name-list');
    Route::post('/sponsor-category-images-list', [SponsorController::class, 'categoryImageList'])->name('sponsor-category-images-list');
    Route::post('/sponsor-view', [SponsorController::class, 'sponsorView'])->name('sponsor-view');

    Route::get('/contact', [ProfileController::class, 'contact'])->name('contact');


    /*Notification */
    Route::post('/notification-list', [NotificationController::class, 'index'])->name('notification-list');
    Route::post('/notification-count', [NotificationController::class, 'getNotificationCount'])->name('notification-count');
    Route::post('/notification-read', [NotificationController::class, 'notificationRead'])->name('notification-read');
    /*Notification*/

    Route::post('/check-menu-status', [ProfileController::class, 'checkMenuStatus'])->name('check-menu-status');
});



Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/forget_password', [LoginController::class, 'forgetPassword'])->name('forget_password');








// END