@extends('common2')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="Log">
    <div class="Log-title">
        <h1>Weight Log</h1>
    </div>

    <div class="Log-content">
        {{-- 更新フォーム --}}
        <form method="POST" action="{{ route('weight.update', ['id' => $log->id]) }}">
            @csrf
            @method('PUT')            
            <div class="Log-item">
                <p class="Log-item__title">日付</p>
                <input type="date" name="date" value="{{ old('date', $log->date) }}">
            </div>

            <div class="Log-item">
                <p class="Log-item__title">体重 (kg)</p>
                <input type="number" name="weight" step="0.1" value="{{ old('weight', $log->weight) }}">
            </div>

            <div class="Log-item">
                <p class="Log-item__title">摂取カロリー</p>
                <input type="number" name="calories" value="{{ old('calories', $log->calories) }}">
            </div>

            <div class="Log-item">
                <p class="Log-item__title">運動時間</p>
                <input type="time" name="exercise_time" value="{{ old('exercise_time', $log->exercise_time) }}">
            </div>

            <div class="Log-item">
                <p class="Log-item__title">運動内容</p>
                <textarea name="exercise_content">{{ old('exercise_content', $log->exercise_content) }}</textarea>
            </div>

            <div class="button">
                <div class="button-item">
                    <a href="{{ route('dashboard') }}" class="reset-button">戻る</a>
                    <button type="submit" class="update-button">更新</button>
                </div>
            </div>
        </form>
        <form method="POST" action="{{ route('weight.destroy', ['id' => $log->id]) }}" onsubmit="return confirm('削除しますか？')">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button">削除</button>
        </form>
    </div>
</div>
@endsection
