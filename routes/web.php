<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Project\CreateController as ProjectCreateController;
use App\Http\Controllers\Project\EditController as ProjectEditController;
use App\Http\Controllers\Project\DeleteController as ProjectDeleteController;
use App\Http\Controllers\Project\ListController as ProjectListController;
use App\Http\Controllers\Project\SaveController as ProjectSaveController;
use App\Http\Controllers\Project\ViewController as ProjectViewController;

use App\Http\Controllers\Task\CreateController as TaskCreateController;
use App\Http\Controllers\Task\EditController as TaskEditController;
use App\Http\Controllers\Task\DeleteController as TaskDeleteController;
use App\Http\Controllers\Task\SaveController as TaskSaveController;

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

Route::permanentRedirect('/', '/projects');

Route::prefix('projects')
    ->name('projects.')
    ->group(function () {
        Route::get('/', ProjectListController::class)->name('list');
        Route::get('create', ProjectCreateController::class)->name('create');
        Route::get('edit/{id}', ProjectEditController::class)->name('edit');
        Route::get('delete/{id}', ProjectDeleteController::class)->name('delete');
        Route::post('save', ProjectSaveController::class)->name('save');
        Route::get('view/{id}', ProjectViewController::class)->name('view');
    });

Route::prefix('tasks')
    ->name('tasks.')
    ->group(function () {
        Route::get('create/{project_id}', TaskCreateController::class)->name('create');
        Route::get('edit/{id}', TaskEditController::class)->name('edit');
        Route::get('delete/{id}', TaskDeleteController::class)->name('delete');
        Route::post('save', TaskSaveController::class)->name('save');
    });
