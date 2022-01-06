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

Route::get('/',[TaskController::class, 'index']);
Route::get('/calendar',[TaskController::class, 'show']);


/*
ここの部分書いた
Route::get('/', function () {
    return view('tasks', [
        'tasks' => App\Models\Task::latest()->get()
    ]);
 });

 Route::post('/task', function (Request $request) {
    request()->validate(
        [
            'name' => 'required|unique:tasks|min:3|max:255'
        ],
        [
            'name.required' => 'タスク内容を入力してください。',
            'name.unique' => 'そのタスクは既に追加されています。',
            'name.min' => '3文字以上で入力してください。',
            'name.max' => '255文字以内で入力してください。'
        ]
    );
    $task = new Task();
    $task->name = request('name');
    $task->deadline = request('deadline');
    $task->save();
    return redirect('/');
 });

 Route::delete('/task/{task}', function (Task $task) {
    $task->delete();
    return redirect('/');
 });

 Route::post('/complete', function (Request $request){
     $content = Task::where('id', $request->id)->first();
     if( $content->is_completed === 0) {
     $content->update(['is_completed' => 1]);
     } elseif($content->is_completed === 1) {
     $content->update(['is_completed' => 0]);
     }
     return redirect('/');
 });
*/

