<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserGroupController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\SystemLogController;
use App\Http\Controllers\Admin\PaperController;
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
    Route::get('/', [IndexController::class, 'index'])->name('admin.index');

    Route::prefix('products')->group(function () {
        Route::get('/product_type/{product_type}', [ProductController::class, 'product_type'])->name('products.product_type');
    });
    Route::prefix('users')->group(function () {
        Route::get('/user_role/{user_role}', [UserController::class, 'user_role'])->name('users.user_role');
    });

    Route::prefix('messages')->group(function () {
        Route::get('/trash', [MessageController::class, 'trashedItems'])->name('messages.trash');
        Route::delete('/force_destroy/{id}', [MessageController::class, 'force_destroy'])->name('messages.force_destroy');
        Route::get('/restore/{id}', [MessageController::class, 'restore'])->name('messages.restore');
    });

    Route::prefix('customers')->group(function () {
        Route::get('/trash', [CustomerController::class, 'trashedItems'])->name('customers.trash');
        Route::get('/export', [CustomerController::class, 'export'])->name('customers.export');
        Route::delete('/force_destroy/{id}', [CustomerController::class, 'force_destroy'])->name('customers.force_destroy');
        Route::get('/restore/{id}', [CustomerController::class, 'restore'])->name('customers.restore');
    });

    Route::prefix('branches')->group(function () {
        Route::get('/trash', [BranchController::class, 'trashedItems'])->name('branches.trash');
        Route::delete('/force_destroy/{id}', [BranchController::class, 'force_destroy'])->name('branches.force_destroy');
        Route::get('/restore/{id}', [BranchController::class, 'restore'])->name('branches.restore');
    });

    Route::prefix('users')->group(function () {
        Route::get('/trash', [UserController::class, 'trashedItems'])->name('users.trash');
        Route::delete('/force_destroy/{id}', [UserController::class, 'force_destroy'])->name('users.force_destroy');
        Route::get('/restore/{id}', [UserController::class, 'restore'])->name('users.restore');
    });

    Route::prefix('userGroups')->group(function () {
        Route::get('/trash', [UserGroupController::class, 'trashedItems'])->name('userGroups.trash');
        Route::delete('/force_destroy/{id}', [UserGroupController::class, 'force_destroy'])->name('userGroups.force_destroy');
        Route::get('/restore/{id}', [UserGroupController::class, 'restore'])->name('userGroups.restore');
    });


    Route::prefix('products')->group(function () {
        Route::get('/trash', [ProductController::class, 'trashedItems'])->name('products.trash');
        Route::delete('/force_destroy/{id}', [ProductController::class, 'force_destroy'])->name('products.force_destroy');
        Route::get('/restore/{id}', [ProductController::class, 'restore'])->name('products.restore');
    });

    Route::prefix('productCategories')->group(function () {
        Route::get('/trash', [ProductCategoryController::class, 'trashedItems'])->name('productCategories.trash');
        Route::delete('/force_destroy/{id}', [ProductCategoryController::class, 'force_destroy'])->name('productCategories.force_destroy');
        Route::get('/restore/{id}', [ProductCategoryController::class, 'restore'])->name('productCategories.restore');
    });

    Route::prefix('papers')->group(function () {
        Route::get('/trash', [PaperController::class, 'trashedItems'])->name('papers.trash');
        Route::delete('/force_destroy/{id}', [PaperController::class, 'force_destroy'])->name('papers.force_destroy');
        Route::get('/restore/{id}', [PaperController::class, 'restore'])->name('papers.restore');
    });

    Route::resource('userGroups', UserGroupController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('products', ProductController::class);
    Route::resource('productCategories', ProductCategoryController::class);
    Route::resource('branches', BranchController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('messages', MessageController::class);
    Route::resource('options', OptionController::class);
    Route::resource('configs', ConfigController::class);
    Route::resource('systemlogs', SystemLogController::class);
    Route::resource('papers', PaperController::class);
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
});

Route::get('administrator/login', [AuthController::class, 'login'])->name('login');
Route::get('administrator/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('administrator/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');

Route::view('/{any}', 'layouts.mobile')
    //->middleware(['auth'])
    ->where('any', '.*');
