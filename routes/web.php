<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PaymentController;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tambah_pembiayaan',[PaymentController::class,'create'])->name('tambah');
Route::post('/createPembiayaan',[PaymentController::class,'store'])->name('storePembiayaan');

Route::get('/edit_pembiayaan/{id}',[PaymentController::class,'edit'])->name('editPayment');
Route::post('/update/{id}',[PaymentController::class,'update'])->name('updatePembiayaan');
Route::delete('delete_pembiayaan/{id}',[PaymentController::class,'destroy'])->name('deletePayment');  

Route::get('/payment/export_excel', [PaymentController::class,'export_excel'])->name('downloadExcel');

Route::get('/payment/cetak_pdf', [PaymentController::class,'export_pdf'])->name('exportPdf');