<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Education;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::get('/logout', 'Auth\LoginController@logout');

/*forget password */
Route::get('/forget-password', [PasswordResetController::class, 'index'])->name('reset.show');
Route::get('/forget-password-show/{token}', [PasswordResetController::class, 'resetPasswordShowForm'])->name('forget.password.show');

Route::post('/forget-password-update', [PasswordResetController::class, 'reset'])->name('forget.password.update');
Route::post('/forget-password', [PasswordResetController::class, 'send_reset_password_email'])->name('forget.password');
/*forget password */


Route::get('/user', function () {
    return view('users_list');
});

Route::view('privacy', 'privacy');
Route::view('privacy-policy', 'privacy-policy');
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:cache');
    // $exitCode = Artisan::call('queue:work');

    // return what you want
});


Auth::routes();


Route::group(['middleware' => ['auth', 'admin']], function () {


    Route::resource('event', 'EventController');
    Route::resource('organization', 'OrganizationController');
    Route::resource('banner', 'BannerController');
    Route::resource('category', 'CategoryController');
    Route::resource('executive-committee', 'ExecutiveCommitteeController');
    Route::resource('youth-committee', 'YouthCommitteeController');
    Route::resource('by-law', 'ByLawController');
    Route::resource('news', 'NewsController');
    Route::resource('sponsor', 'SponsorController');
    Route::resource('native-language', 'NativeLanguageController');
    Route::resource('send-notification', 'SendNotificationController');


    Route::post('check-user-name', [UserController::class, 'checkUserName'])->name('check-user-name');
    Route::post('check-email', [UserController::class, 'checkEmail'])->name('check-email');
    Route::post('check-mobile-no', [UserController::class, 'checkMobileNo'])->name('check-mobile-no');
    Route::get('/whatapp', [OrganizationController::class, 'whatAppSetting'])->name('whatapp');
    Route::post('/whatapp-save', [OrganizationController::class, 'saveWhatAppDetails'])->name('whatapp-save');

    Route::get('/history', [HistoryController::class, 'index'])->name('history');
    Route::post('/history-save', [HistoryController::class, 'save'])->name('history-save');

    Route::get('/organization-setting', [OrganizationController::class, 'org_setting'])->name('organization-setting');
    Route::post('/org-color-setting-save', [OrganizationController::class, 'saveColorSetting'])->name('org-color-setting-save');

    Route::post('/org-aboutUs-save', [OrganizationController::class, 'saveAboutUs'])->name('org-aboutUs-save');


    Route::get('/contact', [OrganizationController::class, 'contact'])->name('contact');
    Route::post('/contact-save', [OrganizationController::class, 'saveContact'])->name('contact-save');

    Route::post('/search-dashboard', [DashboardController::class, 'searchDashboard'])->name('search-dashboard');
    Route::post('/check-menu', [OrganizationController::class, 'checkMenu'])->name('check-menu');

    Route::post('password-reset', [PasswordResetController::class, 'updatePassword']);
    Route::get('common', [HomeController::class, 'commonFunction']);
    Route::get('/users_form', function () {
        return view('users_form');
    });





    Route::resource('profile', 'ProfileController');

    // Route::get('/profile', function () {
    //     if(Auth::user()->user_role == "1") {
    //         return view('profile');
    //     } else{
    //         return view('org_profile');
    //     }

    // })->name('profile');


    Route::get('/learningpathlist', [Education::class, 'learningpathlist'])->name('learningpathlist');;
    Route::get('/Editlearningpathlistval/{id}', [Education::class, 'Editlearningpathlistval'])->name('Editlearningpathlistval');
    Route::POST('/Addlearningpathtitle', [Education::class, 'Addlearningpathtitle'])->name('Addlearningpathtitle');;
    Route::POST('/updatelearningpathtitle', [Education::class, 'updatelearningpathtitle'])->name('updatelearningpathtitle');;
    Route::get('/organisation', [OrganisationController::class, 'organisation'])->name('organisation');;
    Route::get('/Organisationadd', [OrganisationController::class, 'Organisationadd'])->name('Organisationadd');;
    Route::get('/organisationeditview', [OrganisationController::class, 'organisationeditview'])->name('organisationeditview');;
    Route::get('/OrganisationEdit', [OrganisationController::class, 'OrganisationEdit'])->name('OrganisationEdit');;
    Route::get('/organisationAdmin', [OrganisationController::class, 'organisationAdmin'])->name('organisationAdmin');;
    Route::get('/organisationUserGroup', [OrganisationController::class, 'organisationUserGroup'])->name('organisationUserGroup');;
    Route::get('/organisationadminadd', [OrganisationController::class, 'organisationadminadd'])->name('organisationadminadd');;
    Route::get('/Courseassignlist', [OrganisationController::class, 'Courseassignlist'])->name('Courseassignlist');;
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');;
    Route::get('/Categorylist', [MasterController::class, 'Categorylist'])->name('Categorylist');;
    Route::POST('/AddCategory', [MasterController::class, 'AddCategory'])->name('AddCategory');;
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/Categorylist', [MasterController::class, 'Categorylist'])->name('Categorylist');;
    // Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');

    Route::get('/report', [ReportController::class, 'index'])->name('report');

    Route::get('/PreTest', [ReportController::class, 'PreTest'])->name('PreTest');
    Route::get('/PostTest', [ReportController::class, 'PostTest'])->name('PostTest');
    Route::get('/Feedback', [ReportController::class, 'Feedback'])->name('Feedback');
    Route::get('/Language', [LanguageController::class, 'Language'])->name('Language');
    // Route::get('/sponsors', [BannerController::class, 'banner'])->name('sponsors');
    // Route::get('/sponsor_add', [BannerController::class, 'Addbanner'])->name('sponsor_add');
    // Route::get('/sponsor_edit', [BannerController::class, 'bannerEdit'])->name('sponsor_edit');

    // Route::get('/event', [HomeController::class, 'event'])->name('event');
    // Route::get('/event_add', [HomeController::class, 'event_add'])->name('event_add');
    // Route::get('/event_edit', [HomeController::class, 'event_edit'])->name('event_edit');

    Route::get('/past_event', [HomeController::class, 'past_event'])->name('past_event');
    Route::get('/past_event_add', [HomeController::class, 'past_event_add'])->name('past_event_add');
    Route::get('/past_event_edit', [HomeController::class, 'past_event_edit'])->name('past_event_edit');

    Route::get('/manage_about_us', [HomeController::class, 'manage_about_us'])->name('manage_about_us');
    Route::get('/manage_about_us_add', [HomeController::class, 'manage_about_us_add'])->name('manage_about_us_add');
    Route::get('/manage_about_us_edit', [HomeController::class, 'manage_about_us_edit'])->name('manage_about_us_edit');



    Route::get('/organisation_setting_add', [HomeController::class, 'organisation_setting_add'])->name('organisation_setting_add');
    Route::get('/organisation_setting_edit', [HomeController::class, 'organisation_setting_edit'])->name('organisation_setting_edit');



    // Route::get('/organisation_setting', [HomeController::class, 'org_setting'])->name('organisation_setting');
    Route::get('/organisation_setting_add', [HomeController::class, 'organisation_setting_add'])->name('organisation_setting_add');
    Route::get('/organisation_setting_edit', [HomeController::class, 'organisation_setting_edit'])->name('organisation_setting_edit');

    Route::get('/user_dashboard', [HomeController::class, 'user_dashboard'])->name('user_dashboard');


    Route::get('/committee', [HomeController::class, 'committee'])->name('committee');
    Route::get('/committee_add', [HomeController::class, 'committee_add'])->name('committee_add');
    Route::get('/committee_edit', [HomeController::class, 'committee_edit'])->name('committee_edit');

    Route::get('/s_category', [HomeController::class, 'sponsor_category'])->name('s_category');

    // Route::get('/send_notification', [HomeController::class, 'send_notification'])->name('send_notification');

    Route::get('/e_committee', [HomeController::class, 'e_committee'])->name('e_committee');
    Route::get('/e_committee_add', [HomeController::class, 'e_committee_add'])->name('e_committee_add');
    Route::get('/e_committee_edit', [HomeController::class, 'e_committee_edit'])->name('e_committee_edit');

    Route::get('/by_law', [HomeController::class, 'by_law'])->name('by_law');
    Route::get('/by_law_add', [HomeController::class, 'by_law_add'])->name('by_law_add');
    Route::get('/by_law_edit', [HomeController::class, 'by_law_edit'])->name('by_law_edit');

    // Route::get('/news', [HomeController::class, 'news'])->name('news');
    // Route::get('/news_add', [HomeController::class, 'news_add'])->name('news_add');
    // Route::get('/news_edit', [HomeController::class, 'news_edit'])->name('news_edit');

    // Route::get('/history', [HomeController::class, 'history'])->name('history');
    Route::get('/native_language', [HomeController::class, 'native_language'])->name('native_language');
    // Route::get('/banner', [HomeController::class, 'banner'])->name('banner');




    Route::get('/addlevel', function () {
        return view('add_level');
    });
    Route::get('/editlevel', function () {
        return view('edit_level');
    });
});
