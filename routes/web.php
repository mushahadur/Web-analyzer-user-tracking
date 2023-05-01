<?php

use App\Http\Controllers\BrowserPageController;
use App\Http\Controllers\ContinentsPageController;
use App\Http\Controllers\CountriesPageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DevicesPageController;
use App\Http\Controllers\FrontViewController;
use App\Http\Controllers\KeywordResearchController;
use App\Http\Controllers\OperatingSystemPageController;
use App\Http\Controllers\PageBehaviorController;
use App\Http\Controllers\ReferrerPageController;
use App\Http\Controllers\SearchEnginePageController;
use App\Http\Controllers\SitePagesLoadingTimeController;
use App\Http\Controllers\SocialNetworkPageController;
use App\Http\Controllers\UserInfoController;
use App\Http\Controllers\UserWebsiteLinkController;
use App\Http\Controllers\VisitorIPOnMapController;
use App\Http\Controllers\VisitorTrackingBySite;
use App\Http\Controllers\VisitorTrackingController;
use Illuminate\Support\Facades\Route;

//
//Route::get('/', function () {
//    return view('welcome');
//})->middleware('loginCheck');

// Dashboard
Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('loginCheck');

// Start User Site Add Route
Route::get('/add-new-site',[UserWebsiteLinkController::class, 'index'])->middleware('loginCheck');
Route::post('/addNewUserSite',[UserWebsiteLinkController::class, 'addNewUserSite'])->middleware('loginCheck');
Route::post('/updateNewUserSite',[UserWebsiteLinkController::class, 'updateNewUserSite'])->middleware('loginCheck');
Route::get('/getUserSiteList',[UserWebsiteLinkController::class, 'getAllUserSiteList'])->middleware('loginCheck');
Route::post('/userSiteSelectByID',[UserWebsiteLinkController::class, 'getUserSiteByID'])->middleware('loginCheck');
Route::post('/userSiteDelete',[UserWebsiteLinkController::class, 'userSiteDelete'])->middleware('loginCheck');
// End User Site Add Route

// Start Site Site Loading Route
Route::get('/sitePageUrlAndLoadingTime',[SitePagesLoadingTimeController::class, 'sitePageUrlAndLoadingTime'])->middleware('loginCheck');
// End Site Site Loading Route

// Start Visitor Tracking Route
Route::post('/visitorTracking',[VisitorTrackingController::class, 'visitorTracking']);
// End Visitor Tracking Route

// Start Visitor Tracking By Site
Route::get('/trackingBySite/{id}',[VisitorTrackingBySite::class, 'SiteTrackIndex'])->middleware('loginCheck');
Route::get('/getAllBrowser',[VisitorTrackingBySite::class, 'getAllBrowser'])->middleware('loginCheck');
Route::get('/getAllDevice',[VisitorTrackingBySite::class, 'getAllDevice'])->middleware('loginCheck');
Route::get('/siteUrlAndLoadingTime',[VisitorTrackingBySite::class, 'siteUrlAndLoadingTime'])->middleware('loginCheck');

Route::get('/countryTrackingForMap',[VisitorTrackingBySite::class, 'countryTrackingForMap'])->middleware('loginCheck');

Route::get('/overviewPageLoadTime',[VisitorTrackingBySite::class, 'overviewPageLoadTime'])->middleware('loginCheck');

// End Visitor Tracking By Site


// Start Behavoir Page Route
Route::get('/behaviorPageIndex/{id}',[PageBehaviorController::class, 'indexPage'])->middleware('loginCheck');
// End Behavoir Page Route

// Start Referrer Page Route
Route::get('/referrerPageIndex/{id}',[ReferrerPageController::class, 'indexPage'])->middleware('loginCheck');
// End Referrer Page Route

// Start Search Engine Page Route
Route::get('/searchEnginePageIndex/{id}',[SearchEnginePageController::class, 'indexPage'])->middleware('loginCheck');
// End Search Engine Page Route

// Start social Network Page Route
Route::get('/socialNetworkPageIndex/{id}',[SocialNetworkPageController::class, 'indexPage'])->middleware('loginCheck');
// End social Network Page Route

// Start Operating System Page Route
Route::get('/operatingSystemPageIndex/{id}',[OperatingSystemPageController::class, 'indexPage'])->middleware('loginCheck');
// End Operating System Page Route

// Start Browser Page  Route
Route::get('/browserPageIndex/{id}',[BrowserPageController::class, 'indexPage'])->middleware('loginCheck');
// End Browser Page  Route

// Start Devices Page  Route
Route::get('/devicePageIndex/{id}',[DevicesPageController::class, 'indexPage'])->middleware('loginCheck');
// End Devices Page  Route

// Start Continents Page  Route
Route::get('/continentsPageIndex/{id}',[ContinentsPageController::class, 'indexPage'])->middleware('loginCheck');
// End Continents Page  Route

// Start Country Page  Route
Route::get('/countriesPageIndex/{id}',[CountriesPageController::class, 'indexPage'])->middleware('loginCheck');
// End Country Page  Route

// Start View Visitor IP On Map Page  Route
Route::get('/viewOnMapPageIndex/{id}',[VisitorIPOnMapController::class, 'indexPage'])->middleware('loginCheck');
// End View Visitor IP On Map Page  Route


Route::get('/user-login',[UserInfoController::class, 'loginPage'])->name('user.login');
Route::post('/userRegistration',[UserInfoController::class, 'userRegistration']);
Route::post('/userLogin',[UserInfoController::class, 'userLogin']);
Route::get('/logOut',[UserInfoController::class, 'onLogOut']);

// Start Front View Page  Route
//Route::get('/',[FrontViewController::class, 'indexFrontView']);
// End Front View Page  Route

//Route::get('/test',[VisitorIPOnMapController::class, 'test'])->middleware('loginCheck');


//===============key word analysis========================================================
Route::get('/',[FrontViewController::class, 'mainCoreView']);


Route::get('/keywordHome',[KeywordResearchController::class, 'indexPage']);

Route::get('/metaTagHome',[KeywordResearchController::class, 'metaTagHome']);
Route::post('/keywordHome',[KeywordResearchController::class, 'keywordHome']);

Route::get('/keyData',[KeywordResearchController::class, 'keyWordData']);


Route::get('/test',[KeywordResearchController::class, 'test']);




