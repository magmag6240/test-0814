@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks-content">
    <div class="thanks-text">
        <p>ご意見いただきありがとうございました。</p>
    </div>
    <div class="thanks-button">
        <button class="thanks-button-submit" type="submit">トップページへ</button>
    </div>
</div>
@endsection