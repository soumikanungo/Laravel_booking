<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RazorpayController;
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

// Route::get('/', function () {
//     return view('admin.dashboard');
// });
Route::get('/',[AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('login',[AdminController::class,'login'])->name('admin.login');
Route::post('credentials',[AdminController::class,'credentials'])->name('admin.credentials');
Route::get('list',[AdminController::class,'index'])->name('bookings.listing');
Route::get('msg',[UserController::class,'msg'])->name('bookings.message');
Route::get('add',[UserController::class,'create'])->name('bookings.add');
Route::post('store',[UserController::class,'store'])->name('bookings.store');
Route::get('show/{id}',[UserController::class,'show'])->name('bookings.show');
Route::get('edit/{id}',[UserController::class,'edit'])->name('bookings.edit');
Route::post('update/{id}',[UserController::class,'update'])->name('bookings.update');
Route::delete('destroy/{id}',[UserController::class,'destroy'])->name('bookings.destroy');
Route::get('/export',[UserController::class,'exportUsers'])->name('export');
Route::get('logout', function () {
    //dd('logout');
    Session::forget('admin');
   return redirect('/login');});

Route::get('product',[RazorpayController::class,'index']);
Route::post('razorpay-payment',[RazorpayController::class,'store'])->name('razorpay.payment.store');

Route::get('createClients',[ClientController::class,'create'])->name('createClients');
Route::post('addClients',[ClientController::class,'store'])->name('addClients');
// Route::get('getClients', function () {
//     return view('clients.index');
// });
Route::get('allClients',[ClientController::class,'index'])->name('allClients');
Route::get('edit/{id}',[ClientController::class,'edit'])->name('edit');
Route::post('update/{id}',[ClientController::class,'update'])->name('update');
Route::delete('destroy/{id}', [ClientController::class,'destroy'])->name('destroy');
Route::delete('delSelected', [ClientController::class,'deleteAll'])->name('delSelected');
Route::get('captcha',[ClientController::class,'captcha'])->name('captcha');
Route::get('getLocation/{id}',[ClientController::class,'getLocation'])->name('getLocation');
Route::get('chart',[ClientController::class,'chart'])->name('chart');
