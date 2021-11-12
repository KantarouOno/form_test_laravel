@extends('layouts/layout')
 
@section('content')
<form method="POST" action="{{ route('contact.confirm') }}">
    @csrf
    <h4>お名前</h4>
    <input
        name="name"
        value="{{ old('name') }}"
        type="text"><br>
    @if ($errors->has('name'))
        <p class="error-message">{{ $errors->first('name') }}</p>
    @endif

    <h4>フリガナ</h4>
    <input
        name="furigana"
        value="{{ old('furigana') }}"
        type="text"><br>
    @if ($errors->has('furigana'))
        <p class="error-message">{{ $errors->first('furigana') }}</p>
    @endif

    <h4>メールアドレス</h4>
    <input
        name="email"
        value="{{ old('email') }}"
        type="text"><br>
    @if ($errors->has('email'))
        <p class="error-message">{{ $errors->first('email') }}</p>
    @endif

    <h4>件名</h4>
    <input
        name="title"
        value="{{ old('title') }}"
        type="text"><br>
    @if ($errors->has('title'))
        <p class="error-message">{{ $errors->first('title') }}</p>
    @endif


    <h4>お問い合わせ内容</h4>
    <textarea name="body">{{ old('body') }}</textarea><br>
    @if ($errors->has('body'))
        <p class="error-message">{{ $errors->first('body') }}</p>
    @endif

    <button type="submit">
        確認
    </button>
</form>
@endsection