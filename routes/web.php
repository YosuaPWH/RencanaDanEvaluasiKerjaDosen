<?php

use App\Http\Controllers\CRUDTableController;
use App\Http\Controllers\LoginController;
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

Route::post('/login/auth', [LoginController::class, 'login']);

Route::get('/user/login', function() {
    return view('login');
})->name('login');

Route::get('/api/{useraccount}/{token}/{appid}', function(){

})->middleware('auth.token');

Route::get('/user/logout', [LoginController::class, 'logout']);

Route::get('/logut', function() {
    Auth::logout();
    dd('berhasil');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/rencana-kerja/{jenisPelaksanaan}', [CRUDTableController::class, 'tampilData']);

    Route::get('/biodata', function() {
        return view('pages.biodata');
    });

    Route::get('/', function() {
        return view('pages.biodata');
    })->name('home');

    Route::post('/rencana-kerja/{jenisTabel}/tambah-data', [CRUDTableController::class, 'tambahData']);

});