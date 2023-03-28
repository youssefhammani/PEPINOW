<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlantsController;
use App\Http\Controllers\CategoriesController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('profile', 'profile');
    Route::patch('editProfile', 'editProfile');
});

// Route::get('plant',[PlanstController::class,'index']);

// Route::apiResource('category',CategoriesController::class);

Route::group(['controller' => CategoriesController::class], function () {
    Route::get('categories', 'index')->middleware('permission:show category');
    Route::post('category', 'store')->middleware('permission:add category');
    Route::get('category/{id}', 'show')->middleware('permission:show category');
    Route::put('category/{id}', 'update')->middleware('permission:edit category');
    Route::delete('category/{id}', 'destroy')->middleware('permission:delete category');
});

Route::group(['controller' => PlantsController::class], function () {
    Route::get('plants', 'index');
    Route::post('plant', 'store')->middleware('permission:add plant');
    Route::get('plant/{id}', 'show');
    Route::put('plant/{id}', 'update')->middleware('permission:edit every plant|edit my plant');
    Route::delete('plant/{id}', 'destroy')->middleware('permission:delete every plant|delete my plant');
});
