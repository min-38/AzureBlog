<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudyController;
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
// Route::get('/loadClas', 'StudyController@loadLang');

Route::controller(StudyController::class)->group(function () {
    Route::get('/loadPosts', 'index');
    Route::get('/loadCategory', 'getCategory');
    Route::post('/study/store', 'store');
});
// Route::resource('loadLang', StudyController::class); // study listing

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'post'], function () {
    
    // Route::get('edit/{id}', 'PostController@edit');
    // Route::post('update/{id}', 'PostController@update');
    // Route::delete('delete/{id}', 'PostController@delete');
});