@extends('layouts.app')

@section('content')
<div class="thanks-wrapper">
    <h1 class="background-text">Thank you</h1>
    <div class="thanks-content">
        <p class="message">お問い合わせありがとうございました</p>
        <a href="{{ route('contact.index') }}" class="home-button">HOME</a>
    </div>
</div>
@endsection
