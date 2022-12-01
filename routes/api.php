<?php

use App\Http\Controllers\ApiControllers\SprintController;
use App\Http\Controllers\ApiControllers\ProjectController;
use App\Http\Controllers\ApiControllers\GroupController;
use App\Http\Controllers\ApiControllers\YearController;
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

Route::get('/sprint', [SprintController::class, 'sprint']);
Route::get('/sprints', [SprintController::class, 'sprints']);
Route::get('/project', [ProjectController::class, 'project']);
Route::get('/group', [GroupController::class, 'group']);
Route::get('/year', [YearController::class, 'year']);
Route::get('/projects', [ProjectController::class, 'projects']);


Route::post('/sprint/create', [SprintController::class, 'create']);

