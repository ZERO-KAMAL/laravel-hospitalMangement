<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use GuzzleHttp\Middleware;
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

// Route::get('viewpath',[HomeController::class,'functionName']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth','verified');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// admin
Route::get('/add_doctor_view', [AdminController::class, 'addview']);
Route::post('/upload_doctor', [AdminController::class, 'upload']);

Route::post('/appointment', [HomeController::class, 'appointment']);
Route::get('/myappointment', [HomeController::class, 'myappointment']);
Route::get('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint']);

Route::get('/showappointmnets', [AdminController::class, 'showappointmnets']);
Route::get('/approved/{id}', [AdminController::class, 'approved']);
Route::get('/delete/{id}', [AdminController::class, 'delete']);

Route::get('/showdoctor', [AdminController::class, 'showdoctor'])->name('showdoctor');

Route::get('/deletedoctor/{id}', [AdminController::class, 'deletedoctor']);
Route::get('/updatedoctor/{id}', [AdminController::class, 'updatedoctor']);
Route::post('/editdoctor/{id}', [AdminController::class, 'editdoctor']);


Route::get('/emailview/{id}', [AdminController::class, 'emailview']);
Route::post('/sendemail/{id}', [AdminController::class, 'sendemail']);
