<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Api\WardController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\ProvinceController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/profile', [AuthController::class, 'userProfile']);
    Route::post('/change-pass', [AuthController::class, 'changePassWord']);    
});

Route::group([
    'middleware' => 'auth:api'
], function ($router) {
    Route::resource('products', ProductController::class);
    Route::resource('notifications', NotificationController::class);
});

Route::get('/get_districts/{province_id}',[DistrictController::class,'get_districts_by_province_id']);
Route::get('/get_wards/{district_id}',[WardController::class,'get_wards_by_district_id']);
Route::get('/get_provinces',[ProvinceController::class,'get_provinces']);

Route::get('/get_users_by_branch_id/{branch_id}',[UserController::class,'get_users_by_branch_id']);
