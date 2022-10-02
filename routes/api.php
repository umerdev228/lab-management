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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('v1/admin/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
Route::post('v1/admin/logout', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('v1/admin/lab', [\App\Http\Controllers\Admin\LaboratoryController::class, 'index']);
Route::post('v1/admin/lab', [\App\Http\Controllers\Admin\LaboratoryController::class, 'store']);
Route::get('v1/admin/lab/remove/{id}', [\App\Http\Controllers\Admin\LaboratoryController::class, 'destroy']);
