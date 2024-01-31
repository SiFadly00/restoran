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


Route::get('/login','UserController@login')->name('login');
Route::post('/postlogin','UserController@postlogin')->name('postlogin');
Route::get('/','UserController@homeuser')->name('homeuser');
Route::get('/logout','UserController@logout')->name('logout');

Route::middleware('auth')->group(function(){

    Route::get('/detailpesan/{menu}', 'UserController@detailpesan')->name('detailpesan');
    Route::post('/postpesanan/{menu}', 'UserController@postpesanan')->name('postpesanan');
    Route::get('/keranjang', 'UserController@keranjang')->name('keranjang');
    Route::post('/checkout', 'UserController@checkout')->name('checkout');
    Route::get('/riwayat','UserController@riwayat')->name('riwayat');

    Route::get('/homeadmin','AdminController@homeadmin')->name('homeadmin');
    Route::get('/tambah','AdminController@tambah')->name('tambah');
    Route::post('/posttambah','AdminController@posttambah')->name('posttambah');
    Route::get('/edit/{menu}','AdminController@edit')->name('edit');
    Route::post('/postedit/{menu}','AdminController@postedit')->name('postedit');
    Route::get('/hapus/{menu}','AdminController@hapus')->name('hapus');

    Route::get('/konfirbayar','KasirController@konfirbayar')->name('konfirbayar');
    Route::get('/tampildetailpesanan/{no_meja}','KasirController@tampildetailpesan')->name('tampildetailpesan');
    Route::post('/prosesbayar','KasirController@prosesbayar')->name('prosesbayar');
    Route::get('/summary','KasirController@summary')->name('summary');
    Route::get('/tampildetailsummary/{transaksi_id}','KasirController@tampildetailsummary')->name('tampildetailsummary');

    Route::get('/kelolauser','AdminController@kelolauser')->name('kelolauser');
    Route::get('/tampiltambahdatauser','AdminController@tampiltambahdatauser')->name('tampiltambahdatauser');
    Route::post('/tambahdatauser','AdminController@tambahdatauser')->name('tambahdatauser');
    Route::get('/tampileditdatauser/{user}','AdminController@tampileditdatauser')->name('tampileditdatauser');
    Route::post('/editdatauser/{user}','AdminController@editdatauser')->name('editdatauser');
    Route::get('/hapususer/{user}','AdminController@hapususer')->name('hapususer');
    Route::get('/log','AdminController@log')->name('log');
    
    Route::get('/printtransaksi','OwnerController@printtransaksi')->name('printtransaksi');
    Route::post('/filtering','OwnerController@filtering')->name('filtering');
});
