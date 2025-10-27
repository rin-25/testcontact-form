<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FashionablyLate</title>

    {{-- 共通スタイル --}}
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">


    {{-- ページごとのCSSを読み込む --}}
    @yield('css')
</head>
<body>
@if (request()->is('admin*'))
<div class="header-logout">
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">logout</button>
  </form>
</div>
@endif

    <main>
        @yield('content')
    </main>
</body>
</html>
