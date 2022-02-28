<!DOCTYPE html>
<html lang="ja">

<head>
    <title>ToDoAPP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid" style="font-family:'Dela Gothic One', cursive;font-family: 'Kiwi Maru', serif;font-family: 'M PLUS Rounded 1c', sans-serif;;">
          <a class="navbar-brand" href="/" style="font-family:'Dela Gothic One', cursive;font-family: 'Kiwi Maru', serif;font-family: 'M PLUS Rounded 1c', sans-serif;;">HOME</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/completed_lists">完了タスク一覧</a>
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
<div class="fixed-bottom text-center">
<footer>copy rights by ToDoApp</footer>
</div>

</body>











</html>
