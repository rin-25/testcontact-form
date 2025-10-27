@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<div class="contact-wrapper">
    <h1 class="brand">FashionablyLate</h1>
    <hr>
    <h2 class="title">Contact</h2>

    <form action="{{ route('contact.confirm') }}" method="POST" class="contact-form">
        @csrf
        <div class="form-group">
            <label>お名前 <span class="required">※</span></label>
            <div class="name-fields">
                <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例）山田" class="input-box">
                <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例）太郎" class="input-box">
            </div>
        </div>
        @error('first_name')<p class="error-message">{{ $message }}</p>@enderror
        @error('last_name')<p class="error-message">{{ $message }}</p>@enderror

        <div class="form-group">
            <label>性別 <span class="required">※</span></label>
            <div class="gender-group">
                <label><input type="radio" name="gender" value="1">男性</label>
                <label><input type="radio" name="gender" value="2">女性</label>
                <label><input type="radio" name="gender" value="3">その他</label>
        </div>

        </div>
        @error('gender')<p class="error-message">{{ $message }}</p>@enderror

        <div class="form-group">
            <label>メールアドレス <span class="required">※</span></label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="例）test@example.com" class="input-box full">
        </div>
        @error('email')<p class="error-message">{{ $message }}</p>@enderror

        <div class="form-group">
            <label>電話番号 <span class="required">※</span></label>
            <div class="tel-fields">
                <input type="text" name="tel1" value="{{ old('tel1') }}" maxlength="4" placeholder="080" class="input-box tel">
                <span class="tel-dash">ー</span>
                <input type="text" name="tel2" value="{{ old('tel2') }}" maxlength="4" placeholder="1234" class="input-box tel">
                <span class="tel-dash">ー</span>
                <input type="text" name="tel3" value="{{ old('tel3') }}" maxlength="4" placeholder="5678" class="input-box tel">
            </div>
        </div>

        @if ($errors->has('tel1') || $errors->has('tel2') || $errors->has('tel3'))
            <p class="error-message">電話番号を入力してください</p>
        @endif


        <div class="form-group">
            <label>住所 <span class="required">※</span></label>
            <input type="text" name="address" value="{{ old('address') }}" placeholder="例）東京都渋谷区千駄ヶ谷1-2-3" class="input-box full">
        </div>
        @error('address')<p class="error-message">{{ $message }}</p>@enderror

        <div class="form-group">
            <label>建物名</label>
            <input type="text" name="building" value="{{ old('building') }}" placeholder="例）千駄ヶ谷マンション101" class="input-box full">
        </div>

        <div class="form-group">
            <label>お問い合わせの種類 <span class="required">※</span></label>
            <select name="category_id" class="input-box full">
                <option value="">選択してください</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}</option>
                @endforeach
            </select>
        </div>
        @error('category_id')<p class="error-message">{{ $message }}</p>@enderror

        <div class="form-group">
            <label>お問い合わせ内容 <span class="required">※</span></label>
            <textarea name="detail" class="input-box full textarea" placeholder="お問い合わせ内容をご記入ください">{{ old('detail') }}</textarea>
        </div>
        @error('detail')<p class="error-message">{{ $message }}</p>@enderror

        <div class="button-area">
            <button type="submit" class="btn-confirm">確認画面へ</button>
        </div>
    </form>
</div>
@endsection
