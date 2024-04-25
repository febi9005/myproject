<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages_Controller;
use App\Http\Controllers\User_Controller;
use App\Http\Controllers\Data_Pakaian_Controller;
use App\Http\Controllers\Kategori_Pakaian_Controller;
use App\Http\Controllers\Data_Pembelian_Controller;
use App\Http\Controllers\Metode_Pembayaran_Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::redirect('/', '/login');

Route::get('/login', [Pages_Controller::class, 'loginPage'])->name('login');

Route::post('/login', [User_Controller::class, 'login'])->name('user.login');

Route::get('/register', [Pages_Controller::class, 'registerPage'])->name('register');

Route::post('/register', [User_Controller::class, 'register'])->name('register');

Route::get('/home', function () {
    return view('web.view.home');
});

Route::get('/data_pembelian', function () {
    return view('web.admin.data_pembelian');
});

Route::get('/admin_home', function () {
    return view('web.admin.admin');
})->name('admin_home');

Route::get('/pengguna_home', function () {
    return view('web.view.home');
})->name('pengguna_home');

Route::get('/pengguna_home', [Pages_Controller::class, 'data_pakaian_penggunaPage'])->name('pengguna_home');

Route::get('/cart', [Pages_Controller::class, 'cartpage'])->name('cart');

Route::get('/profil/{user_id}', [User_Controller::class, 'profil'])->name('profil');

Route::patch('user/{id}/update_profile', [User_Controller::class, 'profil'])->name('action.upload_profile');

Route::patch('/profil/{user_id}', [User_Controller::class, 'ubahData'])->name('profil.update');

Route::get('/detail/{pakaian_id}', [Pages_Controller::class, 'detailPage'])->name('detail');

Route::get('/data_pembelian', [Pages_Controller::class, 'data_pembelianPage'])->name('data_pembelian');

Route::get('/data_user', [User_Controller::class, 'user'])->name('data_pengembalian');

Route::get('/metode_pembayaran', [Pages_Controller::class, 'metode_pembayaranPage'])->name('metode_pembayaran');

//pakaian
Route::get('/data_pakaian', [Pages_Controller::class, 'data_pakaianPage'])->name('data_pakaian');

Route::get('/data_pakaian/{pakaian_id}', [Data_Pakaian_Controller::class, 'updateData_Pakaian'])->name('data_pakaian');

Route::get('/create_pakaian', [Data_Pakaian_Controller::class, 'createData_Pakaian'])->name('create_data_pakaian');

Route::post('/create_pakaian', [Data_Pakaian_Controller::class, 'create'])->name('action.create_data_pakaian');

Route::get('/update_data_pakaian/{pakaian_id}', [Data_Pakaian_Controller::class, 'updateData_Pakaian'])->name('update_data_pakaian');

Route::patch('/data_pakaian/{pakaian_id}', [Data_Pakaian_Controller::class, 'update'])->name('data_pakaian.update');

Route::delete('/data_pakaian/{pakaian_id}', [Data_Pakaian_Controller::class, 'delete'])->name('data_pakaian.delete');

//kategori
Route::get('/kategori_pakaian', [Pages_Controller::class, 'kategori_pakaianPage'])->name('kategori_pakaian');

Route::get('/create_kategori_pakaian', [Kategori_Pakaian_Controller::class, 'createKategori_Pakaian'])->name('create_kategori_pakaian');

Route::post('/create_kategori_pakaian', [Kategori_Pakaian_Controller::class, 'create'])->name('action.create_kategori_pakaian');

Route::get('/kategori_pakaian/{kategori_pakaian_id}', [Kategori_Pakaian_Controller::class, 'updateKategori_Pakaian'])->name('update_kategori_pakaian');

Route::post('/update_kategori_pakaian', [Kategori_Pakaian_Controller::class, 'update'])->name('action.kategori_pakaian');

Route::patch('/kategori_pakaian/{kategori_pakaian_id}', [Kategori_Pakaian_Controller::class, 'update'])->name('kategori_pakaian.update');

Route::delete('/kategori_pakaian/{kategori_pakaian_id}', [Kategori_Pakaian_Controller::class, 'delete'])->name('kategori_pakaian.delete');

//metode_pembayaran

Route::get('/metode_pembayaran', [Pages_Controller::class, 'metode_pembayaranPage'])->name('metode_pembayaran');

Route::get('/create_metode_pembayaran', [Metode_Pembayaran_Controller::class, 'createMetode_Pembayaran'])->name('createMetode_Pembayaran');

Route::post('/create_metode_pembayaran', [Metode_Pembayaran_Controller::class, 'create'])->name('action.create_metode_pembayaran');