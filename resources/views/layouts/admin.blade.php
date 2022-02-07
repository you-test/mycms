<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header class="header p-3 d-flex justify-content-between bg-dark">
      <div class="top-title-wrapper">
        <h1 class="mb-3">
          <a href="{{ route('admin.index') }}" class="link-light">ホテルサッポロ予約管理</a>
        </h1>
        <p class="text-white">こんにちは、佐藤さん</p>
      </div>
      <div class="top-link-wrapper d-flex justify-content-end">
        <div>
          <a href="/" class="me-5 btn h-30">サイト表示</a>
        </div>
        <div>
          <a href="" class="btn h-30">ログアウト</a>
        </div>
      </div>
    </header>
    <div class="main-wrapper d-flex ">
      <div class="sidebar p-3 bg-dark">
        <a href="" class="d-block mb-5 link-light btn menu-btn">ダッシュボード</a>
        <a href="" class="d-block mb-5 link-light btn menu-btn">施設情報管理</a>
        <a href="" class="d-block mb-5 link-light btn menu-btn">予約在庫管理</a>
        <a href="" class="d-block mb-5 link-light btn menu-btn">予約管理</a>
        <a href="" class="d-block mb-5 link-light btn menu-btn">ユーザー管理</a>
      </div>
      <div class="container p-3">
        @yield('content')
      </div>
    </div>
</body>
</html>
