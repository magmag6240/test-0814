@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm-content">
    <div class="confirm-title">
        <h2>内容確認</h2>
    </div>
    <form class="form" action="/contacts" method="post">
        @csrf
        <table class="confirm-table">
            <tr class="confirm-table-row">
                <th class="confirm-table-header">お名前</th>
                <td class="confirm-table-text">
                    <input class="confirm-table-input" type="text" name="fullName" value="{{ $contact['fullName'] }}" readonly>
                </td>
            </tr>
            <tr class="confirm-table-row">
                <th class="confirm-table-header">性別</th>
                <td class="confirm-table-text">
                    <input class="confirm-table-input" type="text" name="gender" value="{{ $contact['gender'] }}" readonly>
                </td>
            </tr>
            <tr class="confirm-table-row">
                <th class="confirm-table-header">メールアドレス</th>
                <td class="confirm-table-text">
                    <input class="confirm-table-input" type="email" name="email" value="{{ $contact['email'] }}" readonly>
                </td>
            </tr>
            <tr class="confirm-table-row">
                <th class="confirm-table-header">郵便番号</th>
                <td class="confirm-table-text">
                    <input class="confirm-table-input" type="text" name="zip" value="{{ $contact['zip'] }}" readonly>
                </td>
            </tr>
            <tr class="confirm-table-row">
                <th class="confirm-table-header">建物名</th>
                <td class="confirm-table-text">
                    <input class="confirm-table-input" type="text" name="building_name" value="{{ $contact['building_name'] }}" readonly>
                </td>
            </tr>
            <tr class="confirm-table-row">
                <th class="confirm-table-header">住所</th>
                <td class="confirm-table-text">
                    <input class="confirm-table-input" type="text" name="address" value="{{ $contact['address'] }}" readonly>
                </td>
            </tr>
            <tr class="confirm-table-row">
                <th class="confirm-table-header-opinion">ご意見</th>
                <td class="confirm-table-text">
                    <textarea class="confirm-table-textarea" type="textarea" cols="30" rows="5" name="opinion" readonly>{{ $contact['opinion'] }}</textarea>
                </td>
            </tr>
        </table>
        <div class="form-button">
            <button class="form-button-submit" type="submit">送信</button>
        </div>
        <div class="form-fix">
            <a class="form-fix" href="/">修正する</a>
        </div>
    </form>
</div>
@endsection