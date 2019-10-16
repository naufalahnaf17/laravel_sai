<?php

// Untuk Authenication
Route::post('/login/store' , 'AdminController@loginStore');
Route::get('/logout' , 'AdminController@logout');

// Rute Untuk Memilih Mau Ke Mana User Di Arahkan
Route::get('/' , 'AdminController@index');
// 1 . Read Data Dashboard
Route::get('/dashboard' , 'DashboardController@index');
// 2 . Read Data Siswa
Route::get('/data-siswa' , 'DataSiswaController@index');
// 3 . Read Data Tagihan
Route::get('/data-tagihan' , 'DataTagihanController@index');
// 4. Read Data Pembayaran
Route::get('/data-pembayaran' , 'DataPembayaranController@index');

// Rute Untuk Crud Siswa
// 1 . Create And Read Data Siswa
Route::post('/tambah-siswa/store', 'DataSiswaController@tambahSiswa');
// 2 . Delete Siswa
Route::get('/hapus-siswa/hapus/{nim}', 'DataSiswaController@hapusSiswa');
// 3 . Edit Siswa
Route::get('/edit-siswa/edit/{nim}' , 'DataSiswaController@editSiswa');
Route::put('/edit-siswa/update/{nim}' , 'DataSiswaController@storeEdit');

//Rute Untuk Crud Tagihan
// 1 . Create Tagihan
Route::get('/tambah-tagihan' , 'DataTagihanController@tagihanForm');
Route::post('/tambah-tagihan/store' , 'DataTagihanController@tambahTagihan');
Route::post('/tambah-detail/{no_tagihan}' , 'DataTagihanController@tambahDetail');
// 2 . Delete Tagihan And Tagihan Detail
Route::put('/hapus-detail/store/{nilai}' , 'DataTagihanController@hapusDetail');
Route::get('/hapus-tagihan/hapus/{no_tagihan}' ,'DataTagihanController@hapusTagihan');
// 3 . Edit Tagihan Master And Tagihan Detail
Route::get('/edit-detail/{nilai}' , 'DataTagihanController@modal');
Route::post('/edit-detail/store/{nilai}' , 'DataTagihanController@editDetail');
Route::put('/edit-tagihan/store/{no_tagihan}' , 'DataTagihanController@storeEdit');
Route::get('/edit-tagihan/edit/{no_tagihan}/{nim}' , 'DataTagihanController@editTagihan');

// Rute Untuk Crud Pembayaran
// 1 . Create Pembayaran
Route::get('/tambah-pembayaran' , 'DataPembayaranController@tambahPembayaran');
Route::post('/tambah-pembayaran/storePembayaran' , 'DataPembayaranController@addDataPembayaran');
// 2 . Delete Pembayaran
Route::get('/hapus-pembayaran/{no_bayar}' , 'DataPembayaranController@hapus');
// 3 . Edit Pembayaran
Route::put('/edit-pembayaran/storeEdit/{no_bayar}' , 'DataPembayaranController@storeEdit');
Route::get('/edit-pembayaran/{no_bayar}/{nim}' , 'DataPembayaranController@editPembayaran');
Route::get('/pembayaran/bayar-tagihan/{no_tagihan}/{nilai}' , 'DataPembayaranController@bayar');

Route::post('/siswa/search' , 'DataSiswaController@search');
