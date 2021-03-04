<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\AuthController;
use App\Http\Controllers\v1\ProjectController;
use App\Http\Controllers\v1\RepositoryController;

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

Route::post('v1/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['check.auth']], function () {

    Route::apiResource('v1/project', ProjectController::class);

    Route::apiResource('v1/repository', RepositoryController::class);
    Route::post('v1/repository/{uuid}/do-clone', [RepositoryController::class, 'doClone']);
    Route::get('v1/respository/{uuid}/get-env', [RepositoryController::class, 'getEnv']);
    Route::post('v1/respository/{uuid}/do-create-env', [RepositoryController::class, 'doCreateEnv']);

    Route::apiResource('v1/command', \App\Http\Controllers\v1\CommandController::class);

});
