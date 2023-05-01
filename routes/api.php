<?php

use App\Http\Controllers\UserInfoController;
use App\Http\Controllers\VisitorTrackingBySite;
use App\Http\Controllers\VisitorTrackingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/getVisitorInfo',[VisitorTrackingController::class, 'GetVisitorInfo']);
Route::get('/getIpInfo',[VisitorTrackingController::class, 'getIpInfo']);

Route::post('/visitorTracking',[VisitorTrackingController::class, 'visitorTracking']);

Route::get('/getAllDevice',[VisitorTrackingBySite::class, 'getAllDevice']);

Route::get('/countryTrackingForMap',[VisitorTrackingBySite::class, 'countryTrackingForMap']);
