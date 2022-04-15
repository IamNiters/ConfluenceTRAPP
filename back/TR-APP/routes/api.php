<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//create a new API  public routes 

//Route::resource('drivers', DriverController::class);

//public routes 
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']); 
Route::get('/drivers',[DriverController::class,'index']);
Route::get('/drivers/{id}',[DriverController::class,'show']);
Route::get('/drivers/search/{nom}',[DriverController::class,'search']);

//protected routes
Route::group(['middleware'=>['auth:sanctm']], function () {
Route::post('/drivers',[DriverController::class,'store']); 
Route::put('/drivers/{id}',[DriverController::class,'update']); 
Route::delete('/drivers/{id}',[DriverController::class,'destroy']); 
Route::post('/logout',[AuthController::class,'logout']); 
});





Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
