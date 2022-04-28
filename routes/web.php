<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserGroupController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ImageController;
use Illuminate\Support\Facades\Route;
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

Route::group([
    'prefix' => 'administrator',
    'middleware' => ['auth']
], function () {
    Route::get('/',[IndexController::class,'index'])->name('admin.index');
    Route::resource('userGroups', UserGroupController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('products', ProductController::class);
    Route::resource('productCategories', ProductCategoryController::class);
    Route::resource('branches', BranchController::class);
});





Route::get('administrator/login',[AuthController::class,'login'])->name('login');
Route::post('administrator/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');

Route::view('/{any}', 'layouts.mobile')
    //->middleware(['auth'])
    ->where('any', '.*');
