<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Project\ChangePriorityController as ProjectChangePriorityController;
use App\Http\Controllers\Task\ChangePriorityController as TaskChangePriorityController;

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

Route::prefix('projects')
    ->name('projects.')
    ->group(function () {
        Route::post('priority', ProjectChangePriorityController::class)->name('priority');
    });

Route::prefix('tasks')
    ->name('tasks.')
    ->group(function () {
        Route::post('priority', TaskChangePriorityController::class)->name('priority');
    });
