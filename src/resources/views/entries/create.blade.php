<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>授業の登録</title>
</head>
<body>
    <h1>授業の登録</h1>

    {{-- 入力チェックで引っかかったときのメッセージ --}}
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/entries" method="POST">
        {{-- Laravel では POST のフォームに必ず必要（なりすまし送信を防ぐ） --}}
        @csrf

        <p>
            <label for="day">曜日</label>
            <select id="day" name="day">
                <option value="">選んでください</option>
                @foreach ([1 => '月', 2 => '火', 3 => '水', 4 => '木', 5 => '金'] as $value => $label)
                    {{-- old() は、エラーで戻ってきたときに前の入力を残すためのもの --}}
                    <option value="{{ $value }}" @selected(old('day') == $value)>{{ $label }}曜日</option>
                @endforeach
            </select>
        </p>

        <p>
            <label for="period">時限</label>
            <input type="number" id="period" name="period" min="1" value="{{ old('period') }}">
        </p>

        <p>
            <label for="title">授業名</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}">
        </p>

        <p>
            <label for="room">教室</label>
            <input type="text" id="room" name="room" value="{{ old('room') }}">
        </p>

        <button type="submit">登録する</button>
    </form>

    <p><a href="/entries">一覧に戻る</a></p>
</body>
</html>
