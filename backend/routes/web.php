<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;

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

Route::get('/', function () {
    // TODO: 修正、または削除する
    // エラーが発生し意図通りに動かないため。
    $tasks = Task::all();
    $today = new DateTime();
    $today->format('Y-m-d');
    $three_days_later = new DateTime('+3 day');

    foreach($tasks as $task){
        if($today > strtotime($task->deadline)) {
            echo "遅れ";
        }else if($three_days_later > strtotime($task->deadline)) {
            echo "三日以内";
        }else{
            echo "期限前";
        }
    }

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
