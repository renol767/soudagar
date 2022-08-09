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

Route::get('website', [App\Http\Controllers\WebsiteAdminController::class, 'index'])->middleware(['auth','checkRole:website']);
Route::get('website/editkonten', [App\Http\Controllers\WebsiteAdminController::class, 'editkontenwebsite'])->middleware(['auth','checkRole:website'])->name('editkontenwebsite');
Route::get('website/masteruser', [App\Http\Controllers\WebsiteAdminController::class, 'masteruser'])->middleware(['auth','checkRole:website'])->name('masteruser');
Route::post('website/insertuser', [App\Http\Controllers\WebsiteAdminController::class, 'insertuser'])->middleware(['auth','checkRole:website'])->name('insertuser');
Route::put('website/edituser', [App\Http\Controllers\WebsiteAdminController::class, 'edituser'])->middleware(['auth','checkRole:website'])->name('edituser');
Route::put('website/resetpwuser', [App\Http\Controllers\WebsiteAdminController::class, 'resetpwuser'])->middleware(['auth','checkRole:website'])->name('resetpwuser');
Route::delete('website/deleteuser', [App\Http\Controllers\WebsiteAdminController::class, 'deleteuser'])->middleware(['auth','checkRole:website'])->name('deleteuser');
Route::get('website/masterbrand', [App\Http\Controllers\WebsiteAdminController::class, 'masterbrand'])->middleware(['auth','checkRole:website'])->name('masterbrand');
Route::post('website/insertbrand', [App\Http\Controllers\WebsiteAdminController::class, 'insertbrand'])->middleware(['auth','checkRole:website'])->name('insertbrand');
Route::put('website/editbrand', [App\Http\Controllers\WebsiteAdminController::class, 'editbrand'])->middleware(['auth','checkRole:website'])->name('editbrand');
Route::delete('website/deletebrand', [App\Http\Controllers\WebsiteAdminController::class, 'deletebrand'])->middleware(['auth','checkRole:website'])->name('deletebrand');
Route::get('website/masterproduk', [App\Http\Controllers\WebsiteAdminController::class, 'masterproduk'])->middleware(['auth','checkRole:website'])->name('masterproduk');
Route::post('website/insertproduk', [App\Http\Controllers\WebsiteAdminController::class, 'insertproduk'])->middleware(['auth','checkRole:website'])->name('insertproduk');
Route::put('website/editproduk', [App\Http\Controllers\WebsiteAdminController::class, 'editproduk'])->middleware(['auth','checkRole:website'])->name('editproduk');
Route::delete('website/deleteproduk', [App\Http\Controllers\WebsiteAdminController::class, 'deleteproduk'])->middleware(['auth','checkRole:website'])->name('deleteproduk');
Route::get('website/faq', [App\Http\Controllers\WebsiteAdminController::class, 'faq'])->middleware(['auth','checkRole:website'])->name('faq');
Route::delete('website/deletefaq', [App\Http\Controllers\FaqController::class, 'delete'])->middleware(['auth','checkRole:website'])->name('deletefaq');
Route::put('website/updatefaq', [App\Http\Controllers\FaqController::class, 'update'])->middleware(['auth','checkRole:website'])->name('updatefaq');
Route::post('website/insertfaq', [App\Http\Controllers\FaqController::class, 'insert'])->middleware(['auth','checkRole:website'])->name('insertfaq');
Route::get('website/profil/{id}', [App\Http\Controllers\WebsiteAdminController::class, 'profil'])->middleware(['auth','checkRole:website'])->name('profilwebsite');

//Profil
Route::post('updateprofil', [App\Http\Controllers\UserController::class, 'update'])->middleware(['auth'])->name('updateprofil');


//ADMIN GUDANG
Route::get('gudang', [App\Http\Controllers\AdminGudangController::class, 'index'])->middleware(['auth','checkRole:gudang'])->name('gudang');
Route::get('gudang/pesanan', [App\Http\Controllers\AdminGudangController::class, 'pesanan'])->middleware(['auth','checkRole:gudang'])->name('gudang_pesanan');
Route::get('gudang/produk', [App\Http\Controllers\AdminGudangController::class, 'produk'])->middleware(['auth','checkRole:gudang'])->name('gudang_produk');
Route::delete('gudang/deleteproduk', [App\Http\Controllers\AdminGudangController::class, 'deleteProduk'])->middleware(['auth','checkRole:gudang'])->name('deletegudangproduk');
Route::post('gudang/insertproduk', [App\Http\Controllers\AdminGudangController::class, 'insertProduk'])->middleware(['auth','checkRole:gudang'])->name('insertgudangproduk');
Route::put('gudang/updateproduk', [App\Http\Controllers\AdminGudangController::class, 'updateProduk'])->middleware(['auth','checkRole:gudang'])->name('updategudangproduk');
Route::get('gudang/reseller', [App\Http\Controllers\AdminGudangController::class, 'reseller'])->middleware(['auth','checkRole:gudang'])->name('gudang_reseller');
Route::delete('gudang/deletereseller', [App\Http\Controllers\AdminGudangController::class, 'deleteReseller'])->middleware(['auth','checkRole:gudang'])->name('deletereseller');
Route::post('gudang/insertreseller', [App\Http\Controllers\AdminGudangController::class, 'insertReseller'])->middleware(['auth','checkRole:gudang'])->name('insertreseller');
Route::put('gudang/updatereseller', [App\Http\Controllers\AdminGudangController::class, 'updateReseller'])->middleware(['auth','checkRole:gudang'])->name('updatereseller');
Route::get('gudang/profil/{id}', [App\Http\Controllers\AdminGudangController::class, 'profil'])->middleware(['auth','checkRole:gudang'])->name('profilgudang');
//pesanan
Route::delete('deletepesanan', [App\Http\Controllers\PesananController::class, 'delete'])->middleware(['auth','checkRole:gudang'])->name('deletepesanan');
Route::get('statuspesanan/{id}', [App\Http\Controllers\PesananController::class, 'updateStatusPesanan'])->middleware(['auth','checkRole:gudang'])->name('statuspesanan');
Route::post('insertpesanan', [App\Http\Controllers\PesananController::class, 'insert'])->middleware(['auth','checkRole:gudang'])->name('insertpesanan');

//RESELLER
Route::get('reseller', [App\Http\Controllers\ResellerController::class, 'index'])->middleware(['checkRole:reseller'])->name('reseller');
Route::get('reseller/pengajuan-produk', [App\Http\Controllers\ResellerController::class, 'pengajuanProduk'])->middleware(['checkRole:reseller'])->name('pengajuanproduk');
Route::post('insertpengajuan', [App\Http\Controllers\PesananController::class, 'insert'])->middleware(['auth','checkRole:reseller'])->name('insertpengajuan');
Route::get('reseller/profil/{id}', [App\Http\Controllers\ResellerController::class, 'profil'])->middleware(['auth','checkRole:reseller'])->name('profilreseller');
//BLOG  
Route::get('website/blog/list', [App\Http\Controllers\BlogController::class, 'list'])->middleware('auth')->name('blog');
Route::get('website/blog/create', [App\Http\Controllers\BlogController::class, 'create'])->middleware('auth')->name('create_blog');
Route::post('website/blog/insert', [App\Http\Controllers\BlogController::class, 'insert'])->middleware('auth')->name('insert_blog');
Route::post('website/blog/update', [App\Http\Controllers\BlogController::class, 'update'])->middleware('auth')->name('update_blog');
Route::delete('website/blog/delete', [App\Http\Controllers\BlogController::class, 'delete'])->middleware('auth')->name('delete_blog');
Route::get('website/blog/edit/{id}', [App\Http\Controllers\BlogController::class, 'edit'])->middleware('auth')->name('edit_blog');
Route::get('website/blog/publish/{id}', [App\Http\Controllers\BlogController::class, 'publish'])->middleware('auth')->name('publish_blog');
Route::get('website/blog/draft/{id}', [App\Http\Controllers\BlogController::class, 'draft'])->middleware('auth')->name('draft_blog');

Route::get('blog/{slug}', [App\Http\Controllers\BlogController::class, 'detail'])->name('detailBlog');