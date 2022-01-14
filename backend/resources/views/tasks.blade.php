<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Tasks</title>
    <!-- <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    @extends('layout')
    @section('content')
    @stop
</head>

<body>
    <div class="card mb-3">
        <div class="card-header">タスク新規追加</div>
        <div class="card-body">
            <form method="POST" action="/create">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" value="{{ old = 'name' }}"
                        placeholder="タスク名">
                    @if ($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif
                    <input type="text" name="deadline" class="form-control mt-3 w-5">
                    @if ($errors->has('deadline'))
                        <p class="text-danger">{{ $errors->first('deadline') }}</p>
                    @endif
                    <div class="text-end">
                        <button type="submit" class="btn btn-outline-dark"><i class="fas fa-plus fa-lg mr-2"
                                style="color: grey;"></i>追加</button>
                    </div>
                </div>
            </form>
        </div>
</body>
<div class="card">
    <div class="card-header">タスク一覧</div>
    <div class="card-body">
        @if (count($tasks) > 0)
            <table class="table table-striped">
                <tbody>
                    <thead>
                        <tr>
                            <td></td>
                            <td>@sortablelink('deadline','並び替え')</td>
                            <td>@sortablelink('created_at','並び替え')</td>
                        </tr>
                    </thead>
                    <tr>
                        <th>タスク名</th>
                        <th>期日</th>
                        <th>作成日</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->deadline }}</td>
                            <td>{{ $task->created_at }}</td>
                            <td>
                                <form action="/update_page">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $task->id }}">
                                    <button type="submit" class="btn btn-outline-primary" style="width: 100px;">
                                        更新</button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="/complete">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $task->id }}">
                                    <button type="submit" class="btn btn-outline-success" style="width: 100px;">完了</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        @endif
    </div>
</div>
</div>
</body>

</html>
