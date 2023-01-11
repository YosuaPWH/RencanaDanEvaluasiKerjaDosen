<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\CRUDTableController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SimpulanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


Route::middleware('guest')->group(function() {

    Route::post('/login/auth', [LoginController::class, 'login']);
    
    Route::get('/user/login', function() {
        return view('login');
    })->name('login');

});

Route::middleware('auth')->group(function() {

    Route::middleware('dosen')->group(function() {

        Route::get('rencana-kerja/{periode}/biodata', function() {
            return view('pages.biodata');
        });

        Route::get('rencana-kerja/{periode}/simpulan', [CRUDTableController::class, 'tampilSimpulan']);
        
        Route::get('rencana-kerja/{periode}/{jenisPelaksanaan}', [CRUDTableController::class, 'tampilData']);
        
        Route::post('rencana-kerja/{periode}/{jenisTabel}/tambah-data', [CRUDTableController::class, 'tambahData']);
        
        Route::post('rencana-kerja/{periode}/{jenisTabel}/edit-data', [CRUDTableController::class, 'editData']);
        
        Route::delete('rencana-kerja/{periode}/{jenisTabel}/hapus-data', [CRUDTableController::class, 'hapusData']);
        
        Route::post('rencana-kerja/{periode}/biodata/show-edit', [BiodataController::class, 'showEditBiodata']);
        
        Route::post('rencana-kerja/{periode}/edit-biodata', [BiodataController::class, 'editBiodata']);
        
        Route::post('rencana-kerja/{periode}/{jenisTabel}/show-edit-data', [CRUDTableController::class, 'showEditData']);
    });

    Route::get('/', function() {
        return redirect('/rencana-kerja');
    })->name('home');

    Route::middleware('admin')->group(function() {
        Route::post('tambah-periode', [AdminController::class, 'tambahPeriode']);

        Route::post('tutup-periode', [AdminController::class, 'tutupPeriode']);

        Route::post('buka-periode', [AdminController::class, 'bukaPeriode']);

        Route::delete('hapus-periode', [AdminController::class, 'hapusPeriode']);
    });
        
    Route::get('/user/logout', [LoginController::class, 'logout']);

    Route::get('/rencana-kerja', [LoginController::class, 'returnPage']);

});