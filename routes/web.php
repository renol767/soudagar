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
// LANDING PAGE
Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('website/simpanKontenWeb', [App\Http\Controllers\WebsiteAdminController::class, 'simpanKontenWeb'])->name('simpanKontenWeb');
Auth::routes();

Route::get('website', [App\Http\Controllers\WebsiteAdminController::class, 'index'])->middleware('auth');
Route::get('website/editkonten', [App\Http\Controllers\WebsiteAdminController::class, 'editkontenwebsite'])->middleware('auth')->name('editkontenwebsite');
Route::get('website/masteruser', [App\Http\Controllers\WebsiteAdminController::class, 'masteruser'])->middleware('auth')->name('masteruser');
Route::post('website/insertuser', [App\Http\Controllers\WebsiteAdminController::class, 'insertuser'])->middleware('auth')->name('insertuser');
Route::put('website/edituser', [App\Http\Controllers\WebsiteAdminController::class, 'edituser'])->middleware('auth')->name('edituser');
Route::put('website/resetpwuser', [App\Http\Controllers\WebsiteAdminController::class, 'resetpwuser'])->middleware('auth')->name('resetpwuser');
Route::delete('website/deleteuser', [App\Http\Controllers\WebsiteAdminController::class, 'deleteuser'])->middleware('auth')->name('deleteuser');
Route::get('website/masterbrand', [App\Http\Controllers\WebsiteAdminController::class, 'masterbrand'])->middleware('auth')->name('masterbrand');
Route::post('website/insertbrand', [App\Http\Controllers\WebsiteAdminController::class, 'insertbrand'])->middleware('auth')->name('insertbrand');
Route::put('website/editbrand', [App\Http\Controllers\WebsiteAdminController::class, 'editbrand'])->middleware('auth')->name('editbrand');
Route::delete('website/deletebrand', [App\Http\Controllers\WebsiteAdminController::class, 'deletebrand'])->middleware('auth')->name('deletebrand');
Route::get('website/masterproduk', [App\Http\Controllers\WebsiteAdminController::class, 'masterproduk'])->middleware('auth')->name('masterproduk');
Route::post('website/insertproduk', [App\Http\Controllers\WebsiteAdminController::class, 'insertproduk'])->middleware('auth')->name('insertproduk');
Route::put('website/editproduk', [App\Http\Controllers\WebsiteAdminController::class, 'editproduk'])->middleware('auth')->name('editproduk');
Route::delete('website/deleteproduk', [App\Http\Controllers\WebsiteAdminController::class, 'deleteproduk'])->middleware('auth')->name('deleteproduk');
Route::get('gudang', function () { return view('gudang/admin'); })->middleware(['checkRole:gudang']);
Route::get('reseller', function () { return view('reseller/admin'); })->middleware(['checkRole:reseller'])->name('reseller');

//BLOG  
Route::get('website/blog/list', [App\Http\Controllers\BlogController::class, 'list'])->middleware('auth')->name('blog');
Route::get('website/blog/create', [App\Http\Controllers\BlogController::class, 'create'])->middleware('auth')->name('create_blog');
Route::post('website/blog/insert', [App\Http\Controllers\BlogController::class, 'insert'])->middleware('auth')->name('insert_blog');