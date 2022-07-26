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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('website', [App\Http\Controllers\WebsiteAdminController::class, 'index'])->middleware('auth');
Route::get('website/editkonten', [App\Http\Controllers\WebsiteAdminController::class, 'editkontenwebsite'])->middleware('auth')->name('editkontenwebsite');
Route::get('website/masteruser', [App\Http\Controllers\WebsiteAdminController::class, 'masteruser'])->middleware('auth')->name('masteruser');
Route::post('website/insertuser', [App\Http\Controllers\WebsiteAdminController::class, 'insertuser'])->middleware('auth')->name('insertuser');
Route::put('website/edituser', [App\Http\Controllers\WebsiteAdminController::class, 'edituser'])->middleware('auth')->name('edituser');
Route::put('website/resetpwuser', [App\Http\Controllers\WebsiteAdminController::class, 'resetpwuser'])->middleware('auth')->name('resetpwuser');
Route::delete('website/deleteuser', [App\Http\Controllers\WebsiteAdminController::class, 'deleteuser'])->middleware('auth')->name('deleteuser');
Route::get('gudang', function () { return view('gudang/admin'); })->middleware(['checkRole:gudang']);
Route::get('reseller', function () { return view('reseller/admin'); })->middleware(['checkRole:reseller']);