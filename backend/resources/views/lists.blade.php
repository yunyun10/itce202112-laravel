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
    <h1>
        <table>
            <tr>
                <div class="btn-group" role="group" aria-label="ボタングループサンプル">
                    <td><button type="button" class="btn .border.border-0 w-auto dropdown-toggle btn-sm"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="fa fa-arrow-up"></i><i class="fa fa-arrow-down">ソート</i></button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item " href="/">@sortablelink('deadline', '期日並び替え')</a>
                            <a class="dropdown-item" href="/">@sortablelink('created_at', '作成日並び替え')</a>
                        </div>
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

    <div class="card">
        <div class="card-header">タスク一覧</div>
        <div class="card-body">
            @if (count($lists) > 0)
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td>タスク一覧</td>

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
                                        <input type="hidden" name="id" value="{{ $list->id }}">
                                        <button type="submit" class="btn btn-outline-success"
                                            style="width: 100px;">完了</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="/delete">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $list->id }}">
                                        <button type="submit" name="delete" class="btn btn-outline-danger"
                                            onClick="delete_alert(event);return false;" style="width: 100px;">
                                            削除</button>
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
