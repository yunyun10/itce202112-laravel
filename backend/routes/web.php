<?php

use App\Http\Controllers\RestController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;


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

Route::get('/', [TaskController::class, 'index']);

Route::post('/create', [TaskController::class, 'create']);

Route::post('complete', [TaskController::class, 'complete']);

Route::get('/show_completes', [TaskController::class, 'view_completes']);

Route::post('/delete', [TaskController::class, 'delete']);

Route::post('/uncomplete', [TaskController::class, 'uncomplete']);

Route::get('/update_page', [TaskController::class, 'view_update']);

Route::post('/update', [TaskController::class, 'update']);

Route::get('/search', [TaskController::class, 'search']);
