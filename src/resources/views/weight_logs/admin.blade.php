<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>PiGLy</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>PiGLy</h1>
            <div class="header-buttons">
                <button class="settings-button">目標体重設定</button>
                <button class="logout-button">ログアウト</button>
            </div>
        </header>
        <div class="header-underline"></div>

        <div class="goal-info">
            <div class="goal-weight">
                <span>目標体重</span>
                <span>{{ $weightTarget ? $weightTarget->target_weight : '設定なし' }} kg<</span>
            </div>
            <div class="goal-difference">
                <span>目標まで</span>
                <span>{{ $weightTarget ? ($weightTarget->target_weight - $currentWeight) : '設定なし' }} kg</span>
            </div>
            <div class="latest-weight">
                <span>最新体重</span>
                <span>{{ $latestWeight }} kg</span>
            </div>
        </div>

        <div class="search-section">
            <select>
                <option>年/月/日</option>
            </select>
            <span>～</span>
            <select>
                <option>年/月/日</option>
            </select>
            <button class="search-button">検索</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>日付</th>
                    <th>体重</th>
                    <th>食事摂取カロリー</th>
                    <th>運動時間</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($weightLogs as $log)
                <tr>
                    <td>{{ $log->date }}</td>
                    <td>{{ $log->weight }}kg</td>
                    <td>{{ $log->calories }}cal</td>
                    <td>{{ $log->exercise_time }}</td>
                    <td><button class="edit-button">✎</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            <a href="{{ $weightLogs->previousPageUrl() }}" class="prev-button">&lt;</a>

            @php
                $currentPage = $weightLogs->currentPage();
                $lastPage = $weightLogs->lastPage();
                $startPage = max(1, $currentPage - 1); // 現在のページの1つ前から表示
                $endPage = min($lastPage, $currentPage + 2); // 現在のページの1つ後まで表示
            @endphp

            @for ($page = $startPage; $page <= $endPage; $page++)
                @if ($page == $currentPage)
                    <span class="active">{{ $page }}</span>
                @else
                    <a href="{{ $weightLogs->url($page) }}">{{ $page }}</a>
                @endif
            @endfor

            <a href="{{ $weightLogs->nextPageUrl() }}" class="next-button">&gt;</a>
        </div>

        <button class="add-data-button">データ追加</button>
    </div>
</body>
</html>