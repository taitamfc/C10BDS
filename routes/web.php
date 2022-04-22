<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserGroupController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
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
Route::get('/testLang', function () {
    //lấy giá trị session lang hiện tại, ko có thì để en
    $lang = session('lang', 'en');

    //thay đổi ngôn ngữ hệ thống
    App::setLocale($lang);

    echo __('messages.hello_to_website');
});

Route::get('/changeLanguage/{lang}',function($lang){
    //lưu vào session
    session(['lang' => $lang]);
    //chuyển hướng về trang kia
    return redirect('/testLang');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin.users.login');
    })->name('index');
    Route::get('/login', function () {
        return view('admin.users.login');
    })->name('login');
    Route::resource('userGroups', UserGroupController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('products', ProductController::class);
    Route::resource('productCategories', ProductCategoryController::class);
    Route::resource('branches', BranchController::class);
});

Route::view('/{any}', 'layouts.mobile')
    //->middleware(['auth'])
    ->where('any', '.*');