@extends('layouts/layout')

@section('content')
<form method="POST" action="{{ route('contact.send') }}">
    @csrf

    <h4>お名前</h4>
    {{ $inputs['name'] }}<br>
    <input
        name="name"
        value="{{ $inputs['name'] }}"
        type="hidden">

    <h4>ふりがな</h4>
    {{ $inputs['furigana'] }}<br>
    <input
        name="furigana"
        value="{{ $inputs['furigana'] }}"
        type="hidden">

    <h4>メールアドレス</h4>
    {{ $inputs['email'] }}<br>
    <input
        name="email"
        value="{{ $inputs['email'] }}"
        type="hidden">

    <h4>件名</h4>
    {{ $inputs['title'] }}<br>
    <input
        name="title"
        value="{{ $inputs['title'] }}"
        type="hidden">


    <h4>お問い合わせ内容</h4>
    {!! nl2br(e($inputs['body'])) !!}<br>
    <input
        name="body"
        value="{{ $inputs['body'] }}"
        type="hidden">

    <button type="submit" name="action" value="back">
        入力内容修正
    </button>
    <button type="submit" name="action" value="submit">
        送信する
    </button>
</form>
@endsection