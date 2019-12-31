<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <header>
        <h1>Laravel Blog</h1>
    </header>

@yield('content')

    <footer>
        <small>copyrights &copy; 2018 kotsuban-teikin All rights Reserved.</small>
    </footer>
</body>
</html>