@extends('common2')

@section('css')
    <link rel="stylesheet" href="css/dashboard.css">
@endsection

@section('content')
    <main class="weight">
        <div class="weight-title">
            <div class="weight-sub">
                <p class="weight-text">目標体重</p>
                <h2> {{ session('register-weight') }} <span class="weight-unit">kg</span></h2>
            </div>
            <div class="weight-sub">
                <p class="weight-text">目標まで</p>
                <h2> {{ session('update-weight') -session('register-weight')}} <span class="weight-unit">kg</span></h2>
            </div>
            <div class="weight-sub">
                <p class="weight-text">最新体重</p>
                <h2> {{ session('update-weight') }} <span class="weight-unit">kg</span></h2>
            </div>
        </div>
<!--検索-->
<form method="POST" action="{{ route('weight_logs.search') }}">
    @csrf
    <input type="date" name="start_date">
    <input type="date" name="end_date">
    <button type="submit">検索</button>
</form>


<!--シーディング-->
<div class="admin-table">
    <table class="admin-table-content">
        <tr class="admin-table-header">
        <th class="weight-table__header">日付</th>
        <th class="weight-table__header">体重</th>
        <th class="weight-table__header">食事摂取カロリー</th>
        <th class="weight-table__header">運動時間</th>
        <th class="weight-table__header"></th>
        </tr>
        @foreach($weights as $weight)
        <tr class="table-item">
            <td>{{$weight->date}}</td>
            <td>{{$weight->weight}}</td>
            <td>{{$weight->calories}}</td>
            <td>{{$weight->exercize_time}}</td>

        <!--詳細ページ-->
        <td>
        <a class="table-item__detail" href="#detail-{{$weight->id}}" data-id="{{$weight->id}}">✏</a>
        </td>
        </tr>
        @endforeach
        </table>
        </div>
<!--ページネーション-->
<div class="pagination">
    {{$weights->links()}}
</div>

<!-- モーダル（初期は非表示） -->
<div id="modal" class="modal" style="display:none;">
    <form id="weight-form" method="POST" action="{{ route('weight.store') }}">
        @csrf
        <label>日付</label>
        <input type="date" name="date" required>

        <label>体重</label>
        <input type="number" step="0.1" name="weight" required>

        <label>カロリー</label>
        <input type="number" name="calories">

        <label>運動時間</label>
        <input type="time" name="exercise_time">

        <label>運動内容</label>
        <input type="text" name="exercise_content">

        <button type="submit">登録</button>
        <button type="button" id="close-modal">閉じる</button>
    </form>
</div>
    </div>
            </div>
            </div>
@endsection