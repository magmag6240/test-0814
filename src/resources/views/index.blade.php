@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form">
    <div class="contact-form-title">
        <h2>お問い合わせ</h2>
    </div>
    <form class="form" action="/contacts/confirm" method="post">
        @csrf

        <div class="form-group">
            <div class="group-title">
                <span class="group-title-item">お名前</span>
                <span class="required group-title-required">※</span>
            </div>
            <div class="group-content">
                <input class="form-text-name" type="text" id="familyName" name="familyName" value="{{ old('familyName') }}">
                <input class="form-text-name" type="text" id="lastName" name="lastName" value="{{ old('lastName') }}">
                <div class="form-example-name">
                    <p class="example-name1" id="example">例）山田</p>
                    <p class="example-name2" id="example">例）太郎</p>
                </div>
                <div class="error_name">
                    @error('fullName')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class=" form-group">
            <div class="group-title">
                <span class="group-title-item">性別</span>
                <span class="required group-title-required" aria-hidden="true">※</span>
            </div>
            <div class="group-content-gender">
                <label class="form-gender">
                    <input class="gender-radio" name="gender" type="radio" value="{{ old('gender') }}" checked>
                    <span for="men" class="radio-text">男性</span>
                </label>
                <label class="form-gender">
                    <input class="gender-radio" name="gender" type="radio" value="{{ old('gender') }}">
                    <span for="female" class="radio-text">女性</span>
                </label>
            </div>
        </div>
        <div class=" form-group">
            <div class="group-title">
                <span class="group-title-item">メールアドレス</span>
                <span class="required group-title-required">※</span>
            </div>
            <div class="group-content">
                <input class="form-text-email" type="text" name="email" value="{{ old('email') }}" id="email" data-inputAssist="email">
                <div class="form-example-email" id="example">例）test@example.com</div>
            </div>
            <div class="error_email">
                @error('email')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class=" form-group">
            <div class="group-title">
                <span class="group-title-item">郵便番号</span>
                <span class="required group-title-required">※</span>
            </div>
        </div>
        <div class="group-content">
            <span class="postcode">〒</span>
            <input class="form-text-postcode " type="text" size="8" id="zip" name="zip" value="{{ old('zip') }}">
            <button class="api-address" type="button">住所を自動入力</button>
            <div class="form-example-postcode" id="example">例）123-4567</div>
            <div class="error_postcode">
                @error('zip')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class=" form-group">
            <div class="group-title">
                <span class="group-title-item">住所</span>
                <span class="required group-title-required" aria-hidden="true">※</span>
            </div>
            <div class="group-content">
                <input class="form-text-address" id="address" type="text" name="address" value="{{ old('address') }}">
                <div class="form-example-address" id="example">例）東京都渋谷区千駄ヶ谷1-2-3</div>
                <div class="error_address">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="group-title">
                <span class="group-title-item">建物名</span>
            </div>
            <div class="group-content">
                <input class="form-text-building_name" type="text" name="building_name" value="{{ old('building_name') }}">
                <div class="form-example-building_name" id="example">例）千駄ヶ谷マンション101</div>
            </div>
        </div>
        <div class="form-group">
            <div class="group-title">
                <span class="group-title-item">ご意見</span>
                <span class="required group-title-required">※</span>
            </div>
            <div class="group-content">
                <textarea class="form-textarea" cols="30" rows="5" name="opinion" value="{{ old('opinion') }}">
                </textarea>
                <div class="error_opinion">
                    @error('opinion')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-button">
            <button class="form-button-submit" type="submit">確認</button>
        </div>
        <script src="{{ mix('js/Address.js') }}"></script>
        <script src="{{ mix('js/Zip.js') }}"></script>
    </form>
</div>
@endsection