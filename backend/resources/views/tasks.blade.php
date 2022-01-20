<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Tasks</title>
    <!-- <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


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
        <div class="text-end">
            <button type="button" class="btn .border.border-0 w-auto dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">Primary</button>
            <div class="dropdown-menu">

                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
            </script>

            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
                        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
            </script>

            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
                        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
            </script>
        </div>
</body>
<div class="card">
    <div class="card-header">タスク一覧</div>
    <div class="card-body">
        @if (count($tasks) > 0)
            <table class="table table-striped table-bordered">
                <tbody>
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
                        <th>期日</th>
                        <th>作成日</th>
                        <th></th>
                        <th></th>
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
                            } else {
                                $task_color = '';
                            }
                        @endphp
                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->deadline }}</td>
                            <td>{{ $task->created_at }}</td>
                            <td></td>
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
                                        onClick="delete_alert(event);return false;" style="width: 100px;"> 削除</button>
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
