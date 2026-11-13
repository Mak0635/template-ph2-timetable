<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>時間割の登録一覧</title>
</head>
<body>
    <h1>時間割の登録一覧</h1>

    <table border="1">
        <tr>
            <th>曜日</th>
            <th>時限</th>
            <th>授業名</th>
            <th>教室</th>
        </tr>
        {{-- $entries は TimetableEntryController の index() から渡される --}}
        @forelse ($entries as $entry)
            <tr>
                <td>{{ $entry->day }}</td>
                <td>{{ $entry->period }}限</td>
                <td>{{ $entry->title }}</td>
                {{-- room は空でもよい列なので、空のときは「未定」と表示する --}}
                <td>{{ $entry->room ?? '未定' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">まだ登録がありません</td>
            </tr>
        @endforelse
    </table>
</body>
</html>
