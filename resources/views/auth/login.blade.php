@extends('layouts.app')

@section('content')
<div class="auth-header">
    <h1 class="brand">FashionablyLate</h1>
    <a href="{{ route('register') }}" class="switch-link">register</a>
</div>

<div class="auth-body">
    <h2 class="auth-title">Login</h2>
    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">パスワード</label>
            <input id="password" type="password" name="password" placeholder="例: coachtech1106">
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="button-area">
            <button type="submit" class="btn-auth">ログイン</button>
        </div>
    </form>
</div>
@endsection
