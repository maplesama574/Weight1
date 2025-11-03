@extends('common')

@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('content')
            <p class="sub-title">新規会員登録</p>
            <p class="step1">STEP1 アカウント情報の登録</p>
        </div>
        <div class="table">
            <form method="POST" action="{{route('register1.store')}}">
                @csrf
                <div class="content">
                    <p class="content-title">お名前</p>
                    <input type="text" name="name" value="{{old('name')}}" placeholder="お名前を入力">
                </div>
                <div class="content">
                    <p class="content-title">メールアドレス</p>
                    <input type="email" name="email" value="{{old('email')}}" placeholder="メールアドレスを入力">
                </div>
                <div class="content">
                    <p class="content-title">パスワード</p>
                    <input type="password" name="password" placeholder="パスワードを入力">
                </div>
                <button class="next-button">次に進む</button>
            </form>
            <a href="{{route('login')}}">ログインはこちらから</a>
        </div>
    </div>
@endsection
