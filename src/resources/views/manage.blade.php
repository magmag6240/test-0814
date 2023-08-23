@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/manage.css') }}">
@endsection

@section('content')
<div class="manage-form">
    <div class="manage-form-title">
        <h2>管理システム</h2>
    </div>
    <form class="search-form" action="/manages/search" method="get">
        @csrf
        <div class="search-item-name">
            <span class="search-form-title">お名前</span>
            <input class="search-text" type="text" name="search" value="{{ old('search') }}">
        </div>
        <div class="search-item-gender">
            <span class="search-form-title-gender">性別</span>
            <label class="search-gender-all">
                <input class="gender-radio" id="gender-all" type="radio" name="search" value="{{ old('search') }}" checked>
                <span class="radio-text" for="gender-all">全て</span>
            </label>
            <label class="search-gender-m">
                <input class="gender-radio" id="gender-m" type="radio" name="search" value="{{ old('search') }}">
                <span class="radio-text" for="gender-f">男性</span>
            </label>
            <label class="search-gender-f">
                <input class="gender-radio" id="gender-f" type="radio" name="search" value="{{ old('search') }}">
                <span class="radio-text" for="gender-f">女性</span>
            </label>
        </div>
        <div class="search-item-date">
            <span class="search-form-title">登録日</span>
            <input class="search-text" type="date" name="search" value="{{ old('search') }}">
            <span class="search-date-span">~</span>
            <input class="search-text" type="date" name="search" value="{{ old('search') }}">
        </div>
        <div class="search-item-email">
            <span class="search-form-title">メールアドレス</span>
            <input class="search-text-email" type="email" name="search" value="{{ old('search') }}">
        </div>
        <div class="search-form-button">
            <button class="search-form-button-submit" type="submit">検索</button>
        </div>
        <div class="form-fresh">
            <a class="form-fresh" href="/manages">リセット</a>
        </div>
    </form>
    <div class="paginate">
        {{ $contents->links('vendor.pagination.custom') }}
    </div>
    <div class="manage-table">
        <table class="manage-table-inner" width="100%">
            <tr class="manage-table-row">
                <th class="manage-table-header-id">ID</th>
                <th class="manage-table-header-name">お名前</th>
                <th class="manage-table-header-gender">性別</th>
                <th class="manage-table-header-email">メールアドレス</th>
                <th class="manage-table-header-opinion">ご意見</th>
            </tr>
            @foreach($contents as $content)
            <tr class="manage-table-row">
                <td class="manage-table-item-id">{{ $content->id }}</td>
                <td class="manage-table-item-name">{{ $content->fullName }}</td>
                <td class="manage-table-item-gender">{{ $content->gender }}</td>
                <td class="manage-table-item-email">{{ $content->email }}</td>
                <td class="manage-table-item-opinion">{{ Str::limit($content->opinion, 51) }}
                    <span class="manage-table-item-opinion-all">{{ $content->opinion }}</span>
                    <form class="delete-form" action="/contacts/delete" method="post">
                        @method('delete') @csrf
                        <div class="delete-form-button">
                            <input type="hidden" name="id" value="{{ $content['id'] }}">
                            <button class="delete-form-button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection