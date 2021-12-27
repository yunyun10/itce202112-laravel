<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Tasks</title>
    <!-- <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>
<body>
    @foreach ($completed_collections as $completed_collection)
    <h1>完了タスク</h1>
    <div class=" card-body">
        @if (count($tasks) > 0)
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>タスク名</th>
                        <th>締め切り</th>
                        <th>作成日時</th>
                        <th>完了ボタン</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->deadline }}</td>
                            <td>{{ $task->created_at }}</td>
                            <td>{{ $task->is_completed }}</td>

</body>


















</html>
