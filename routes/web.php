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
    return view('welcome', ['title' => 'SIMPENDAS']);
});



Route::post('/postlogin','LoginController@postlogin')->name('postlogin');

Route::get('/logout','LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth','ceklevel:admin&guru']], function(){
    // Siswa
    Route::get('/siswa','siswaController@index')->name('siswa');
    Route::get('/siswashow','siswaController@show')->name('siswashow');
    Route::get('/exportsiswa','siswaController@siswaexport')->name('exportsiswa');
    Route::post('/importsiswa','siswaController@siswaimportexcel')->name('importsiswa');
    Route::get('/tambahdatasiswa','siswaController@create')->name('tambahdatasiswa');
    Route::post('/simpandatasiswa','siswaController@store')->name('simpandatasiswa');
    Route::get('/editdatasiswa/{id}','siswaController@edit')->name('editdatasiswa');
    Route::post('/updatedatasiswa/{id}','siswaController@update')->name('updatedatasiswa');
    Route::get('/deletedatasiswa/{id}','siswaController@destroy')->name('deletedatasiswa');
    Route::get('/siswa/create_tunggal/{id}', 'siswaController@create_tunggal')->name('create_tunggal');
    // Identitas sekolah
    Route::get('/identitassekolah','identitassekolahController@index')->name('identitassekolah');
    Route::get('/tambahidentitassekolah','identitassekolahController@create')->name('tambahidentitassekolah');
    Route::post('/simpanidentitassekolah','identitassekolahController@store')->name('simpanidentitassekolah');
    Route::get('/editidentitassekolah/{id}','identitassekolahController@edit')->name('editidentitassekolah');
    Route::post('/updateidentitassekolah/{id}','identitassekolahController@update')->name('updateidentitassekolah');
    Route::get('/deleteidentitassekolah/{id}','identitassekolahController@destroy')->name('deleteidentitassekolah');
    //17/12/2021
    Route::resource('tahuns', TahunController::class);
    Route::get('/deletetahun/{id}','TahunController@destroy')->name('deletetahun');
    Route::resource('mapels', MapelController::class);
    Route::get('/deletemapel/{id}','MapelController@destroy')->name('deletemapel');
    Route::resource('nilais', NilaiController::class);
    Route::get('/deletenilai/{id}','NilaiController@destroy')->name('deletenilai');
    Route::get('/nilai/create_tunggal/{id}', 'NilaiController@create_tunggal')->name('create_tunggal');
    Route::resource('kelass', KelasController::class);
    Route::get('/deletekelas/{id}','KelasController@destroy')->name('deletekelas');
    Route::resource('roles', RoleController::class);
    Route::get('/deleterole/{id}','RoleController@destroy')->name('deleterole');
    Route::resource('prokers', ProkerController::class);
    Route::get('/deleteproker/{id}','ProkerController@destroy')->name('deleteproker');
    Route::resource('silabuss', SilabusController::class);
    Route::get('/deletesilabus/{id}','SilabusController@destroy')->name('deletesilabus');
    Route::resource('sks', SkController::class);
    Route::get('/deletesk/{id}','SkController@destroy')->name('deletesk');
    Route::resource('jadwals', JadwalController::class);
    Route::get('/deletejadwal/{id}','JadwalController@destroy')->name('deletejadwal');
    Route::resource('karyawans', KaryawanController::class);
    Route::post('/importkaryawan','KaryawanController@karyawanimportexcel')->name('importkaryawan');
    Route::get('/deletekaryawan/{id}','KaryawanController@destroy')->name('deletekaryawan');
    Route::get('/exportkaryawan','KaryawanController@karyawanexport')->name('exportkaryawan');
    Route::get('/rekapitulasi','BerandaController@show');
    //upload PDF
    Route::get('/karyawan/show', 'KaryawanController@show');
    Route::get('/karyawan/cetak_pdf', 'KaryawanController@cetak_pdf');
    Route::get('/siswa/show', 'SiswaController@show');
    Route::get('/siswa/cetak_pdf', 'SiswaController@cetak_pdf');
    Route::get('/nilai/show', 'NilaiController@show');
    Route::get('/nilai/cetak_pdf', 'NilaiController@cetak_pdf');
    //detail
    Route::get('/detailkaryawan/{id}', 'KaryawanController@detail')->name('detailkaryawan');
    Route::get('/detailsiswa/{id}', 'SiswaController@detail')->name('detailsiswa');
    Route::get('/detailnilai/{id}', 'NilaiController@detail')->name('detailnilai');
    //download PDF
    Route::get('karyawan/{id}/download', 'KaryawanController@download')->name('karyawan.download');
    Route::get('proker/{id}/download', 'ProkerController@download')->name('proker.download');
    Route::get('silabus/{id}/download', 'SilabusController@download')->name('silabus.download');
    Route::get('sk/{id}/download', 'SkController@download')->name('sk.download');
    Route::get('jadwal/{id}/download', 'JadwalController@download')->name('jadwal.download');
    //USERS
    Route::get('/users', 'UserController@index')->name('users');
    Route::get('/tambah-user', 'UserController@create')->name('tambah.user');
    Route::post('/simpan-user', 'UserController@store')->name('simpan.user');
    Route::get('/edit-user/{id}', 'UserController@edit')->name('edit.user');
    Route::put('/update-user/{id}', 'UserController@update')->name('update.user');
    Route::get('/hapus-user/{id}', 'UserController@destroy')->name('hapus.user');
    //ganti password
    Route::get('password', 'PasswordController@edit')
        ->name('user.password.edit');
    Route::patch('password', 'PasswordController@update')
        ->name('user.password.update');
});

Route::group(['middleware' => ['auth','ceklevel:admin,guru']], function(){
    Route::get('/beranda','BerandaController@index');
    //Route::get('/halamandua','BerandaController@halamandua')->name('halamandua');

});
Auth::routes();

Route::get('/home', 'BerandaController@index')->name('home');
