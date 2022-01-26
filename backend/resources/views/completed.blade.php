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
<body>
    <div class="card">
        <div class="card-header">タスク一覧</div>
        <div class="card-body">

                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td>タスク</td>

                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                        </thead>
                              @foreach ($lists as $list)
                              <tr>
                                <td>{{ $list->name }}</td>
                                <td>{{ $list->deadline }}</td>
                                <td>{{ $list->created_at }}</td>
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
        </div>
    </div>
    </div>
</body>
