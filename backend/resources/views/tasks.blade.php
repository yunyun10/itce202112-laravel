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
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="タスク名">
                    @if ($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif
                    <input type="datetime-local" name="deadline" class="form-control w-25" placeholder="締め切り日">
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
        <form class="d-flex" method="POST" action="/search">
        @csrf
        <input class="form-control w-25" type="search" placeholder="タスクの検索" aria-label="Search" name="search" valie="{{ old('search') }}">
        <button class="btn btn-outline-success w-25" type="submit">Search</button>
        </form>
</body>
<div class="card">
    <div class="card-header">タスク一覧</div>
    <div class="card-body">
        @if (count($tasks) > 0)
            <table class="table table-striped table-bordered">
                <tbody>
                    <thead>
                        <tr>


                            <td></td>
                            <td>@sortablelink('deadline', '並び替え')</td>
                            <td>@sortablelink('created_at', '並び替え')</td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                    </thead>
                    <tr>
                        <td></td>
                        <td>@sortablelink('deadline', '並び替え')</td>
                        <td>@sortablelink('created_at', '並び替え')</td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                </thead>
                    <tr>
                        <th>タスク名</th>
                        <th>期日
                            </span>
                        </th>
                        <th>作成日
                    </tr>
                    @foreach ($tasks as $task)
                        @php
                            $today = date('Y-m-d');
                            $deadline = new Datetime($task->deadline);
                            $today_datetime = new Datetime($today);
                            if (isset($task->deadline)) {
                                $dayDiff = $today_datetime->diff($deadline);
                                if ($dayDiff->invert == 1) {
                                    $task_color = 'bg-danger';
                                } elseif ($dayDiff->format('%a') < 3) {
                                    $task_color = 'bg-warning';
                                } else {
                                    $task_color = '';
                                }
                            }
                        @endphp
                        <tr class="{{ $task_color }} bg-opacity-75 align-middle">
                            <td>
                                {{ $task->name }}
                            </td>
                            <td>
                                {{ $task->deadline }}
                            </td>
                            <td>{{ $task->created_at }}</td>
                            <td>
                                <form method="POST" action="/complete">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $task->id }}">
                                    <button type="submit" class="btn btn-outline-success"
                                        style="width: 100px;">完了</button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="/delete">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $task->id }}">
                                    <button type="submit" name="delete" class="btn btn-outline-danger"
                                        onClick="delete_alert(event);return false;" style="width: 100px;">
                                        削除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    {{ $tasks->links() }}
                </tbody>
            </table>
        @endif
    </div>
</div>
</div>

</body>

</html>
