<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="css/app2.css">
@yield('css')
</head>

<body>
    <header class="header">
        <div class="header-title">
            <div class="header-logo">
                <h1>PiGLy</h1>
            </div>
            <div class="header-sub">
                <ul class="header-nav">
                 @if (Auth::check())
                    <li class="header-nav__item">
                    <form action="/weight_logs/create" method="post">
                    @csrf
                    <button class="header-nav__button">目標体重設定</button>
                    </form>
                    </li>
                    <li class="header-nav__item">
                    <form action="/logout" method="post">
                    @csrf
                    <button class="header-nav__button">ログアウト</button>
                    </form>
                    </li>
                @endif
                </ul>
            </div>
        </div>
    </header>
    
@yield('content')

    </main>
    
</body>
</html>