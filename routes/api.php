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
    //handle post
    Route::get('/post', [postController::class,'allPost']);
    Route::get('/post/{slug}',[postController::class,'singlePost']);
    Route::post('/createPost',[postController::class,'createPost']);
    Route::get('/listUserPost',[postController::class,'userPost']);
    Route::get('/searchPost/{text}',[postController::class,'searchPost']);
    Route::get('/post/{slug}',[postController::class,'singlePost']);
    Route::get('/userPost', [postController::class,'userPost']);
    Route::post('/savePost/{id}',[postController::class,'savePost']);
    Route::delete('/deletePost/{id_post}',[postController::class,'deletePost']);
    Route::delete('/unsavePost/{id}',[postController::class,'unsavePost']);
    //handel tag
    Route::post('/createTag',[postController::class,'createTag']);
    Route::delete('/deleteTag/{id}/{articel_id}',[postController::class,'deleteTag']);
    Route::get('/allTag/{id_article}',[postController::class,'allTag']);
    Route::get('/savedPost',[postController::class,'getSavedPost']);
    Route::get('CEK_TOKEN', function () {
        return response()->json([
            'msg'=>"logged"
        ], 200);
    });
});
//handle Auth

Route::get('/Auth/logout',[AuthController::class,'logout']);
Route::post('/Auth/Register',[AuthController::class,'Register']);
Route::post('/Auth/Login',[AuthController::class,'Login']);
Route::get('/userDetail/{idUser}',[AuthController::class,'infoUsr']);
Route::post('/Auth/GoogleAuth',[AuthController::class,'loginWithGoogle']);
// Route::get('dd',[AuthController::class,'cek']);
