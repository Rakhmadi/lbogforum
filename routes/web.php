<?php

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
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Carbon;
use App\Http\Controllers\AuthControllerWeb;
use App\Http\Controllers\postController;
Route::get('x/', function () {
    return Socialite::driver('google')->stateless()->redirect();
});
Route::get('/Auth/google/Callback', function () {
    $user = Socialite::driver('google')->stateless()->user();
    $f['id'] = $user->getId();
    $f['nickname'] = $user->getNickname();
    $f['name'] = $user->getName();
    $f['email'] = $user->getEmail();
    $f['avatar'] = $user->getAvatar();
    return $f;
});

Route::get('/', function () {
    return view('welcome');
});

Route::post('Login',[AuthControllerWeb::class,'Login']);

Route::get('users/{id}', function ($id) {

})->middleware(['authWeb']);


Route::get('/fo/{view?}',function(){
    return view('vue');
})->where('view', '(.*)')
->name('my-app.index');

Route::get('/f/{vue_capture?}', function(){
    return view('vue');
})->where('vue_capture', '[\/\w\.-]*');

Route::get('/postu/{vue_capture?}', function(){
    return view('vue');
})->where('vue_capture', '[\/\w\.-]*');