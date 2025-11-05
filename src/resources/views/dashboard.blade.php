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
    <div class="search-wrapper">
    <input type="date" name="start_date">
    <input type="date" name="end_date">
    <button type="submit">検索</button>
    </div>
    <div class="update-wrapper">
    <button id="add-weight-btn">データ追加</button>
    </div>

<!-- モーダル -->
<div id="add-modal" class="modal" style="display:none;">
    <form method="POST" action="{{ route('weight.store') }}">
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

        <button type="submit">追加</button>
        <button type="button" id="close-add-modal">閉じる</button>
    </form>
</div>

</form>


<!--シーディング-->
<div class="weight-table">
    <table class="weight-table-content">
        <tr class="weight-table-header">
        <th class="weight-table__header">日付</th>
        <th class="weight-table__header">体重</th>
        <th class="weight-table__header">食事摂取カロリー</th>
        <th class="weight-table__header">運動時間</th>
        <th class="weight-table__header"></th>
        </tr>
        @foreach($weights as $weight)
<tr class="table-item">
    <td>{{ $weight->date }}</td>
    <td>{{ $weight->weight }}</td>
    <td>{{ $weight->calories }}</td>
    <td>{{ $weight->exercise_time }}</td>
     <td>
    <a href="{{ route('detail', ['weightLogId' => $weight->id]) }}" class="table-item__detail">✏</a>
</td>

    </td>
</tr>
@endforeach

        </table>
        </div>
<!--ページネーション-->
<div class="pagination-wrapper">
    {{ $weights->onEachSide(1)->links('pagination::simple-bootstrap-4') }}
</div>

    </div>
            </div>
            </div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('add-modal');
    const openBtn = document.getElementById('add-weight-btn');
    const closeBtn = document.getElementById('close-add-modal');

    openBtn.addEventListener('click', function(e) {
        e.preventDefault();
        modal.style.display = 'block';
    });

    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });
});
</script>
