<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ブログ</title>
    </head>
    <link rel="stylesheet" href="/app.css">

    <body>
        <div class="left">
            <div class="menu">
                @include('components.menu')
            </div>
        </div>
        <div class="right">
            <div class="content-title">
                @yield('title')
            </div>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>
</html>