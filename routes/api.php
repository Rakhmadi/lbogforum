<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\postController;
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    
});
Route::middleware(['authApi'])->group(function () {
    Route::get('/post', [postController::class,'allPost']);
    Route::get('/Auth/logout',[AuthController::class,'logout']);
    Route::get('/users/{id}', function ($id) {
        return $id;  
    });
    Route::get('CEK_TOKEN', function () {
        return response()->json([
            'msg'=>"logged"
        ], 200);        
    });
    Route::get('/post/{slug}',[postController::class,'singlePost']);
    Route::get('/post', [postController::class,'allPost']);
    Route::post('/createPost',[postController::class,'createPost']);
});
Route::post('Auth/Register',[AuthController::class,'Register']);
Route::post('Auth/Login',[AuthController::class,'Login']);
Route::get('userDetail/{idUser}',[AuthController::class,'infoUsr']);
Route::post('Auth/GoogleAuth',[AuthController::class,'loginWithGoogle']);
// Route::get('dd',[AuthController::class,'cek']);
