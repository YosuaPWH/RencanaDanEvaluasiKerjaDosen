<?php

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

    Route::middleware('periode')->group(function() {

        Route::get('{periode}/rencana-kerja/biodata', function() {
            return view('pages.biodata');
        });
        
        Route::get('/', function() {
            return view('pages.rencana_kerja');
        })->name('home');
        
        Route::get('{periode}/rencana-kerja/simpulan', [CRUDTableController::class, 'tampilSimpulan']);
        
        Route::get('{periode}/rencana-kerja/{jenisPelaksanaan}', [CRUDTableController::class, 'tampilData']);
        
        Route::post('{periode}/rencana-kerja/{jenisTabel}/tambah-data', [CRUDTableController::class, 'tambahData']);
        
        Route::post('rencana-kerja/{jenisTabel}/show-edit-data', [CRUDTableController::class, 'showEditData']);
        
        Route::post('{periode}/rencana-kerja/{jenisTabel}/edit-data', [CRUDTableController::class, 'editData']);
        
        Route::delete('{periode}/rencana-kerja/{jenisTabel}/hapus-data', [CRUDTableController::class, 'hapusData']);
        
        Route::post('{periode}/rencana-kerja/biodata/show-edit', [BiodataController::class, 'showEditBiodata']);
        
        Route::post('{periode}/rencana-kerja/edit-biodata', [BiodataController::class, 'editBiodata']);
        
    });
        
    Route::get('/user/logout', [LoginController::class, 'logout']);

    Route::get('/rencana-kerja', function () {
        return view('pages.rencana_kerja');
    });

});