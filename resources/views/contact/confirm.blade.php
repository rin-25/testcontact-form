@extends('layouts.app')

@section('content')
<div class="confirm-wrapper">
  <h1 class="brand">FashionablyLate</h1>
  <hr class="full-line">
  <h2 class="title">Confirm</h2>

    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <table class="confirm-table">
            <tr><th>お名前</th><td>{{ $inputs['first_name'] }}　{{ $inputs['last_name'] }}</td></tr>
            <tr><th>性別</th><td>@if($inputs['gender']==1)男性@elseif($inputs['gender']==2)女性@elseその他@endif</td></tr>
            <tr><th>メールアドレス</th><td>{{ $inputs['email'] }}</td></tr>
            <tr><th>電話番号</th><td>{{ $inputs['tel'] }}</td></tr>
            <tr><th>住所</th><td>{{ $inputs['address'] }}</td></tr>
            <tr><th>建物名</th><td>{{ $inputs['building'] ?? '' }}</td></tr>
            <tr><th>お問い合わせの種類</th><td>{{ $category->content ?? '' }}</td></tr>
            <tr><th>お問い合わせ内容</th><td>{{ $inputs['detail'] }}</td></tr>
        </table>

        @foreach($inputs as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach

        <div class="button-area">
            <button type="submit" class="btn-confirm" name="action" value="submit">送信</button>
            <button type="submit" class="btn-back" name="action" value="back">修正</button>
        </div>
    </form>
</div>
@endsection
