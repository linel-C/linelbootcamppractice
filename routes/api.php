<?php
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('register',[AuthenticationController::class,'register']);
Route::post('login',[AuthenticationController::class,'login']);


Route::group(['middleware' => 'auth:sanctum'],function(){ 
    Route::get('users',[UserController::class,'index']);

    Route::get('todo',[TodoController::class,'index']);  
    Route::post('todo-create',[TodoController::class,'store']); 
    Route::post('todo-update/{id}',[TodoController::class,'update']); 
    Route::get('todo-delete/{id}',[TodoController::class,'destroy']); 



}); 


