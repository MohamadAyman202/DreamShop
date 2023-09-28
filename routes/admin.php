<?php

use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Admin\Auth\UserController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BundleDealsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\FlashSaleController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TaxRuleController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\WithdrawalAccountController;
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

Route::middleware('guest:admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'store'])->name('login.store');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/dashboard/users', [AdminController::class, 'index'])->name('users.index');
    Route::get('/dashboard/users/create', [AdminController::class, 'create'])->name('users.create');
    Route::get('/dashboard/users/edit/{id}', [AdminController::class, 'edit'])->name('users.edit');
    // Route::get('/dashboard/users/show/{id}', [AdminController::class, 'show'])->name('users.show');
    Route::delete('/dashboard/users/destroy//{id}', [AdminController::class, 'destroy'])->name('users.destroy');
    Route::post('/dashboard/users/signup', [AdminController::class, 'signup'])->name('users.signup');
    Route::patch('/dashboard/users/update/{id}', [AdminController::class, 'update'])->name('users.update');

    Route::resource('roles', RoleController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('sub-category', SubCategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('attribute', AttributeController::class);
    Route::resource('tax-rule', TaxRuleController::class);
    Route::resource('collection', CollectionController::class);
    Route::resource('bundle_deals', BundleDealsController::class);
    Route::resource('vouchers', VoucherController::class);
    Route::resource('product', ProductController::class);
    Route::resource('flash_sales', FlashSaleController::class);
    Route::resource('accounts', WithdrawalAccountController::class);
    Route::resource('pages', PageController::class);

    // show all pages template 
    Route::get("/{page}", function ($page) {
        $page = substr_replace($page, '', strrpos($page, '.'));
        return view("admin.$page");
    });
});
