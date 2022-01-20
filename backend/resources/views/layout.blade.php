<!DOCTYPE html>
<html lang="ja">

<head>
    <title>ToDoAPP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">ToDoAPP</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">リスト</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/calendar">カレンダー</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">ダッシュボード</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<div>
    @yield('content')
</div>
<footer>copy rights by ToDoApp</footer>


</body>
</head>










</html>
