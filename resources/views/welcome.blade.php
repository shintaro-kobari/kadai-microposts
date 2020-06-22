@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-3">
                {{-- ユーザ情報 --}}
                @include('users.card')
            </aside>
            <div class="col-sm-5">
                {{-- 投稿一覧 --}}
                @include('microposts.microposts')
            </div>
            <div class="col-sm-4">
                {{-- 投稿フォーム --}}
                @include('microposts.form')
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>{{ __('messages.welcome') }}</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', __('messages.sign_up') , [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection
