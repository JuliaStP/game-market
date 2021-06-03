<?php

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

Route::get('/', function () {
    return view('home', ['goods' => \App\Models\Good::all()]);
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/good{id}', [App\Http\Controllers\GoodController::class, 'good'])->name('good');
Route::get('/news', [App\Http\Controllers\HomeController::class, 'news'])->name('news');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/category{id}', [App\Http\Controllers\GoodController::class, 'category'])->name('category');
Route::get('/order/buy{id}', [App\Http\Controllers\OrderController::class, 'buy'])->name('buy');
Route::get('/order/current', [App\Http\Controllers\OrderController::class, 'current'])->name('order.current');
Route::get('/order/process', [App\Http\Controllers\OrderController::class, 'process'])->name('order.process');
Route::get('/order/previous', [App\Http\Controllers\OrderController::class, 'previous'])->name('order.previous');


Route::group(['middleware' => \App\Http\Middleware\AdminMiddleware::class], function () {
    Route::get('/admin/categories', [App\Http\Controllers\AdminController::class, 'categories'])->name('admin.categories');
    Route::get('/admin/goods', [App\Http\Controllers\AdminController::class, 'goods'])->name('admin.goods');
    Route::get('/admin/orders', [App\Http\Controllers\AdminController::class, 'orders'])->name('admin.orders'); //order list

    Route::get('/admin/create', [App\Http\Controllers\AdminController::class, 'create'])->name('admin.create');
    Route::get('/admin/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');
    Route::get('/admin/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete'])->name('admin.delete');
    Route::post('/admin/save/{id}', [App\Http\Controllers\AdminController::class, 'save'])->name('admin.save');
    Route::post('/admin/add', [App\Http\Controllers\AdminController::class, 'add'])->name('admin.add');

    Route::get('/admin/createpro', [App\Http\Controllers\AdminController::class, 'createpro'])->name('admin.createpro');
    Route::get('/admin/editpro/{id}', [App\Http\Controllers\AdminController::class, 'editpro'])->name('admin.editpro');
    Route::get('/admin/deletepro/{id}', [App\Http\Controllers\AdminController::class, 'deletepro'])->name('admin.deletepro');
    Route::post('/admin/addpro', [App\Http\Controllers\AdminController::class, 'addpro'])->name('admin.addpro');
    Route::post('/admin/savepro/{id}', [App\Http\Controllers\AdminController::class, 'savepro'])->name('admin.savepro');
});
