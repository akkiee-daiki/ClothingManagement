<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>衣類管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body>
<div id="container">
    <header>
{{--        <h1 id="logo"><a href="index.html"><img src="{{ asset('/images/logo.png') }}" alt="衣類管理"></a></h1>--}}
        <h1 id="logo"><a href="index.html">衣類管理</a></h1>
        <aside id="mainimg"><img src="{{ asset('/images/mainimg.jpg') }}" alt="アイキャッチ"></aside>
    </header>

    <nav id="menubar">
        <ul>
            <li><a href="index.html">brand</a></li>
            <li><a href="about.html">Clothes</a></li>
            <li><a href="gallery.html">span</a></li>
            <li><a href="link.html">history</a></li>
        </ul>
    </nav>

    <div id="contents">
        @yield('main')
    </div>

    <footer>
        <small>Copyright&copy; <a href="index.html">Clothing Management</a> All Rights Reserved.</small>
        <span class="pr">《<a href="https://template-party.com/" target="_blank">Web Design:Template-Party</a>》</span>
    </footer>
</div>
@yield('js')
</body>
</html>
