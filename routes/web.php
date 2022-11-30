<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\DashboardController;



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

Route::get('google', function () {
    return view('googleAuth');
});

Route::get('redirect/{driver}', 'App\Http\Controllers\Auth\LoginController@redirectToProvider')->name('redirectToProvider');
Route::get('{driver}/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback')->name('handleProviderCallback');

Route::get('/', function () {
    return view('welcome');
});

Route::get('login','App\Http\Controllers\AuthController@index')->name('login');
Route::post('proses_login','App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout','App\Http\Controllers\AuthController@logout')->name('logout');

//auth -> biro || alumni 

Route::group(['middleware' =>['auth']], function(){
    Route::group(['middleware' => ['cek_login:biro']], function(){
        Route::get('/biro', 'App\Http\Controllers\AdminController@index')->name('admin');
        
        Route::get('/admin/registermahasiswa', function () {
            return view('admin.registermahasiswa');
        });

        Route::post('/admin/registermahasiswa/create','App\Http\Controllers\AdminController@registermahasiswa')->name('registermahasiswa');

        Route::get('/admin/dataalumni', 'App\Http\Controllers\AdminController@index')->name('admin');
        Route::get('/admin/tambahijazah','App\Http\Controllers\AdminController@tambahIjazah')->name('tambahijasa');
        Route::get('/admin/fakultasprodi','App\Http\Controllers\AdminController@tambahfakultasprodi')->name('tambahfakultasprodi');
        Route::get('/admin/prodi','App\Http\Controllers\AdminController@tambahprodi')->name('tambahprodi');
        Route::get('/admin/tahun','App\Http\Controllers\AdminController@tambahtahun')->name('tambahtahun');
        Route::get('/admin/tanggal','App\Http\Controllers\AdminController@tambahtanggal')->name('tambahtanggal');
        Route::post('/admin/ijazah/create','App\Http\Controllers\AdminController@createIjazah')->name('create');
        Route::post('/admin/tambahfakultasprodi/create','App\Http\Controllers\AdminController@createfakultasprodi')->name('createfakultasprodi');
        Route::post('/admin/tambahprodi/create','App\Http\Controllers\AdminController@createprodi')->name('createprodi');
        Route::post('/admin/tambahtahun/create','App\Http\Controllers\AdminController@createtahun')->name('createtahun');
        Route::post('/admin/tambahtanggal/create','App\Http\Controllers\AdminController@createtanggal')->name('createtanggal');
        Route::get('/admin/ijazah/edit/{id}','App\Http\Controllers\AdminController@lihatIjazah')->name('read');
        Route::post('/admin/ijazah/edit/{id}','App\Http\Controllers\AdminController@editIjazah')->name('edit');
        Route::get('/admin/ijazah/delete/{id}','App\Http\Controllers\AdminController@deleteIjazah')->name('delete');
        Route::get('/admin/openijazah/{id}', 'App\Http\Controllers\AdminController@openijazah')->name('openijazah');
        Route::get('/admin/opentranskrip/{id}', 'App\Http\Controllers\AdminController@opentranskrip')->name('opentranskrip');
        Route::get('/admin/grafikipk', 'App\Http\Controllers\AdminController@grafikipk')->name('grafikipk');
        Route::get('/admin/grafikprodi', 'App\Http\Controllers\AdminController@grafikprodi')->name('grafikprodi');
        

    });

    Route::group(['middleware' => ['cek_login:alumni']], function(){
        Route::get('/alumni', 'App\Http\Controllers\AlumniController@index')->name('alumni');
        Route::post('/alumni/edit/{id}','App\Http\Controllers\AlumniController@updateAlumni')->name('editAlumni');
        Route::get('/alumni/openijazah/{id}', 'App\Http\Controllers\AlumniController@openijazah')->name('openijazah');
        Route::get('/alumni/opentranskrip/{id}', 'App\Http\Controllers\AlumniController@opentranskrip')->name('opentranskrip');
        Route::get('/alumni/dataalumni','App\Http\Controllers\AlumniController@dataalumni')->name('dataalumni');
    });
});
Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('grafik', [App\Http\Controllers\DashboardController::class, 'index'])->name('grafik');


// Route::put('ipk/update/{id}', '\App\Http\Controllers\ipknController@update')->name('ipk.update');
// Route::put('predikat/update/{id}', '\App\Http\Controllers\predikatnController@update')->name('predikat.update');


