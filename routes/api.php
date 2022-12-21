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



Route::get('/sprint/{id}', [SprintController::class, 'sprint']);
Route::get('/sprints', [SprintController::class, 'sprints']);

Route::get('/project/{id}', [ProjectController::class, 'project']);
Route::get('/projects', [ProjectController::class, 'projects']);

Route::get('/year/{id}', [YearController::class, 'year']);
Route::get('/years', [YearController::class, 'years']);
Route::get('/yearUsers/{id}', [YearController::class, 'yearUsers']);

Route::get('/group/{id}', [GroupController::class, 'group']);


Route::post('/sprint/create', [SprintController::class, 'create']);
Route::post('/project/create', [ProjectController::class, 'create']);
Route::post('/group/create', [GroupController::class, 'create']);
Route::post('/year/create', [YearController::class, 'create']);


Route::delete('sprints/delete/{id}', [SprintController::class, 'delete']);
Route::delete('project/delete/{id}', [ProjectController::class, 'delete']);
Route::delete('year/delete/{id}', [YearController::class, 'delete']);


Route::put('/year/update/{id}', [YearController::class, 'update']);
Route::put('/sprint/update/{id}', [SprintController::class, 'update']);
Route::put('/project/update/{id}', [ProjectController::class, 'update']);
Route::put('group/update/{id}', [GroupController::class, 'update']);

