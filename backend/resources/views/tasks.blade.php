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
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    @extends('layout')
    @section('content')
    @stop
</head>

<body style="padding-top: 100px;">
    <h1>
        <table>
            <tr>

                    </td>
                    <td>
                    </td>
                </div>
            </tr>
            </div>
        </table>
    </h1>
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

<div class="container-fluid">
    <div class="row">
    <div class="clearfix"></div>
    <div class="col-sm-4 col-md-2 sidebar-fixed" style="background-color:white;">
        <ul class="nav nav-sidebar">
            <li class="active"><a href="">料理</a></li>
            <li><a href="">アクセス</a></li>
            <li><a href="">皆様のご意見</a></li>
            <li><a href="/questionnaire">アンケート</a></li>
        </ul>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="card">
    <div class="card-header">タスク一覧</div>
    <div class="card-body">
            <table class="table table-striped ">
                <tbody>
                    <tr>
                        <td>新規作成</td>
                        <td> <div class="btn-group" role="group" aria-label="ボタングループサンプル">
                            <td><button type="button" class="btn .border.border-0 w-auto dropdown-toggle btn-sm"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                        class="fa fa-arrow-up"></i><i class="fa fa-arrow-down">ソート</i></button>
                                <div class="dropdown-menu" style="text-align: center;">
                                    <a class="dropdown-item " href="/">@sortablelink('deadline', '期日並び替え')</a>
                                    <a class="dropdown-item" href="/">@sortablelink('created_at', '作成日並び替え')</a>
                                </div></td>
                        <td><button type="button" class="btn .border.border-0 w-auto dropdown-toggle btn-sm"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="fa fa-arrow-up"></i><i class="fa fa-arrow-down">タスク一覧</i></button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/">全てのタスク</a>
                            <a class="dropdown-item" href="/">未完了のタスク</a>
                            <a class="dropdown-item" href="/">完了したタスク</a>
                        </div></td>
                        <td></td>
                        <td></td>


                    </tr>
                    </thead>
                    <tr>
                        <form method="POST" action="/create">
                            @csrf
                            <th>
                                <div class="form-group">
                                    <input type="text" name="name" class="border-rounded" value="{{ old('name') }}"
                                        placeholder="タスク名">
                                    @if ($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                            </th>
                            <th><input type="datetime-local" name="deadline" class="form-control" placeholder="締め切り日">
                                @if ($errors->has('deadline'))
                                    <p class="text-danger">{{ $errors->first('deadline') }}</p>
                                @endif
                            </th>
                            <th>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-dark align-items-center"><i
                                            class="fas fa-plus fa-lg mr-2" style="color: grey;"></i>タスクを追加</button>
                            </th>
                            <th></th>
                        </form>
                        <th></th>
                        <th></th>
                    </tr>
         @if (count($tasks) > 0)
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
