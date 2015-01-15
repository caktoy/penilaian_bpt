<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'BerandaController@cekStatusMasuk');
Route::get('/login', 'BerandaController@login');
Route::post('/login', 'BerandaController@authLogin');
Route::get('/logout', 'BerandaController@logout');
Route::get('/beranda', 'BerandaController@beranda');
Route::get('/beranda/ubah_password', 'BerandaController@ubahPassword');
Route::post('/beranda/ubah_password', 'BerandaController@postUbahPassword');
// route ke master
Route::get('/master', 'MasterController@master');
// -- karyawan
Route::get('/master/karyawan', 'MasterController@karyawan');
Route::get('/master/karyawan/tambah', 'MasterController@insertKaryawan');
Route::post('/master/karyawan/tambah', 'MasterController@actInsertKaryawan');
Route::get('/master/karyawan/hapus/{id}', 'MasterController@actDeleteKaryawan');
Route::get('/master/karyawan/ubah/{id}', 'MasterController@updateKaryawan');
Route::post('/master/karyawan/ubah/{id}', 'MasterController@actUpdateKaryawan');
// -- divisi
Route::get('/master/divisi', 'MasterController@divisi');
Route::get('/master/divisi/tambah', 'MasterController@insertDivisi');
Route::post('/master/divisi/tambah', 'MasterController@actInsertDivisi');
Route::get('/master/divisi/hapus/{id}', 'MasterController@actDeleteDivisi');
Route::get('/master/divisi/ubah/{id}', 'MasterController@updateDivisi');
Route::post('/master/divisi/ubah/{id}', 'MasterController@actUpdateDivisi');
// -- rekanan
Route::get('/master/rekanan', 'MasterController@rekanan');
Route::get('/master/rekanan/tambah', 'MasterController@insertRekanan');
Route::post('/master/rekanan/tambah', 'MasterController@actInsertRekanan');
Route::get('/master/rekanan/hapus/{id}', 'MasterController@actDeleteRekanan');
Route::get('/master/rekanan/ubah/{id}', 'MasterController@updateRekanan');
Route::post('/master/rekanan/ubah/{id}', 'MasterController@actUpdateRekanan');
// -- indikator
Route::get('/master/indikator', 'MasterController@indikator');
Route::get('/master/indikator/tambah', 'MasterController@insertIndikator');
Route::post('/master/indikator/tambah', 'MasterController@actInsertIndikator');
Route::get('/master/indikator/hapus/{id}', 'MasterController@actDeleteIndikator');
Route::get('/master/indikator/ubah/{id}', 'MasterController@updateIndikator');
Route::post('/master/indikator/ubah/{id}', 'MasterController@actUpdateIndikator');
// -- jenis indikator
Route::get('/master/jenis_indikator', 'MasterController@jenisIndikator');
Route::get('/master/jenis_indikator/tambah', 'MasterController@insertJenisIndikator');
Route::post('/master/jenis_indikator/tambah', 'MasterController@actInsertJenisIndikator');
Route::get('/master/jenis_indikator/hapus/{id}', 'MasterController@actDeleteJenisIndikator');
Route::get('/master/jenis_indikator/ubah/{id}', 'MasterController@updateJenisIndikator');
Route::post('/master/jenis_indikator/ubah/{id}', 'MasterController@actUpdateJenisIndikator');
// -- range nilai
Route::get('/master/range_nilai', 'MasterController@rangeNilai');
Route::get('/master/range_nilai/tambah', 'MasterController@insertRangeNilai');
Route::post('/master/range_nilai/tambah', 'MasterController@actInsertRangeNilai');
Route::get('/master/range_nilai/hapus/{id}', 'MasterController@actDeleteRangeNilai');
Route::get('/master/range_nilai/ubah/{id}', 'MasterController@updateRangeNilai');
Route::post('/master/range_nilai/ubah/{id}', 'MasterController@actUpdateRangeNilai');
// route ke pengguna
// -- pengguna
Route::get('/pengguna', 'PenggunaController@pengguna');
Route::get('/pengguna/tambah', 'PenggunaController@insertPengguna');
Route::post('/pengguna/tambah', 'PenggunaController@actInsertPengguna');
Route::get('/pengguna/hapus/{id}', 'PenggunaController@actDeletePengguna');
Route::get('/pengguna/ubah/{id}', 'PenggunaController@updatePengguna');
Route::post('/pengguna/ubah/{id}', 'PenggunaController@actUpdatePengguna');
// -- level pengguna
//Route::get('/pengguna/level', 'PenggunaController@levelPengguna');
//Route::get('/pengguna/level/tambah', 'PenggunaController@insertLevelPengguna');
//Route::post('/pengguna/level/tambah', 'PenggunaController@actInsertLevelPengguna');
// route ke penilaian
// -- penilaian
Route::get('/penilaian', 'PenilaianController@penilaian');
Route::get('/penilaian/do/{id}', 'PenilaianController@doPenilaian');
Route::post('/penilaian/do/{id}', 'PenilaianController@actDoPenilaian');
Route::get('/penilaian/do/jenis/{id}', 'PenilaianController@loadByJenis');
// -- rekomendasi
Route::get('/penilaian/rekomendasi', 'PenilaianController@rekomendasi');
Route::get('/penilaian/rekomendasi/set/{id}', 'PenilaianController@doRekomendasi');
Route::post('/penilaian/rekomendasi/set/{id}', 'PenilaianController@actDoRekomendasi');
Route::get('/penilaian/rekomendasi/ulang/{id}', 'PenilaianController@doNilaiUlang');
// route ke laporan
Route::get('/laporan/penilaian', 'LaporanController@penilaian');
Route::get('/laporan/rekanan', 'LaporanController@rekanan');
Route::get('/laporan/kriteria', 'LaporanController@kriteria');
Route::get('/laporan/penilaian/cetak', 'LaporanController@cetakPenilaian');
Route::get('/laporan/rekanan/cetak', 'LaporanController@cetakRekanan');
Route::get('/laporan/kriteria/cetak', 'LaporanController@cetakKriteria');
Route::get('/laporan/penilaian/karyawan/cetak/{id}', 'LaporanController@cetakLaporanKaryawan');