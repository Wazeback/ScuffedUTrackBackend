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

Route::get('/sprint', ['\App\Http\Controllers\ApiControllers\SprintController', 'sprint']);
Route::get('/project', ['\App\Http\Controllers\ApiControllers\ProjectController', 'project']);
Route::get('/group', ['App\Http\Controllers\ApiControllers\GroupController', 'group']);
Route::get('/year', ['App\Http\Controllers\ApiControllers\YearController', 'year']);

Route::post('/sprintCreate', ['\App\Http\Controllers\ApiControllers\SprintController', 'store']);

