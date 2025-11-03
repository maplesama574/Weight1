@extends('common')

@section('css')
<link rel="stylesheet" href="{{asset('css/register2.css')}}">
@endsection

@section('content')
            <p class="sub-title">新規会員登録</p>
            <p class="step1">STEP2 体重データの入力</p>
        </div>
        <div class="table">
            <form method="POST" action="{{route('register2.store')}}">
                @csrf
                <div class="content">
                    <p class="content-title">現在の体重</p>
                    <input type="number" name="now" value="{{old('number')}}" placeholder="現在の体重を入力">㎏
                </div>
                <div class="content">
                    <p class="content-title">目標の体重</p>
                    <input type="number" name="ideal" value="{{old('number')}}"  placeholder="目標の体重を入力">㎏
                </div>
                <button class="create-button">アカウント作成</button>
            </form>
        </div>
    </div>
@endsection