@extends('common')

@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('content')
            <p class="sub-title">ログイン</p>
        </div>
        <div class="table">
            <form method="POST" action="{{route('login')}}">
                @csrf
                <div class="content">
                    <p class="content-title">メールアドレス</p>
                    <input type="email" name="email" placeholder="メールアドレスを入力">
                </div>
                <div class="content">
                    <p class="content-title">パスワード</p>
                    <input type="password" name="password" placeholder="パスワードを入力">
                </div>
                <button class="login-button">ログイン</button>
            </form>
            <a href="{{route('register1')}}">アカウント作成はこちら</a>
        </div>
    </div>
@endsection