<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ContactController;


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



Route::get('/', [PagesController::class, 'index']);

Route::resource('/blog', PostsController::class);

//drivers  routes
Route::get('/drivers',[\App\Http\Controllers\DriverController::class,'index']);
Route::get('/drivers/{id}',[\App\Http\Controllers\DriverController::class,'show']);
Route::get('/drivers/search/{nom}',[\App\Http\Controllers\DriverController::class,'search']);
Route::post('/drivers',[\App\Http\Controllers\DriverController::class,'store']); 
Route::put('/drivers/{id}',[\App\Http\Controllers\DriverController::class,'update']); 
Route::delete('/drivers/{id}',[\App\Http\Controllers\DriverController::class,'destroy']);

//contact routes
// Route::get('/contact', [\App\Http\Controllers\ContactUsFormController::class, 'createForm']);
// Route::post('/contact', [\App\Http\Controllers\ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

Route::get('contact', [ContactController::class, 'createForm']);
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');


//newsletter routes

Route::get('/newsletter',[\App\Http\Controllers\NewsletterController::class,'index']);
Route::post('/newsletter',[\App\Http\Controllers\NewsletterController::class,'store']); 

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

