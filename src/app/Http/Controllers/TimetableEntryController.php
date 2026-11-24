<?php

namespace App\Http\Controllers;

use App\Models\TimetableEntry;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TimetableEntryController extends Controller
{
    public function index()
    //
    {
    $entries = TimetableEntry::orderBy('day')
    ->orderBy('period')
    ->get();

    return view('entries.index', ['entries' => $entries]);
    }

    // 登録フォームを表示する
    public function create()
    {
        return view('entries.create');
    }

    // フォームから送られたデータをチェックして保存する
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                // 同じ曜日・時限の組み合わせがすでにあれば登録できない
                'day' => [
                    'required',
                    'integer',
                    'between:1,5',
                    Rule::unique('timetable_entries')
                        ->where('period', $request->input('period')),
                ],
                'period' => ['required', 'integer', 'min:1'],
                'title' => ['required', 'string', 'max:255'],
                'room' => ['nullable', 'string', 'max:255'],
            ],
            [
                'day.required' => '曜日を選んでください。',
                'day.integer' => '曜日の値が正しくありません。',
                'day.between' => '曜日の値が正しくありません。',
                'day.unique' => 'その曜日・時限にはすでに授業が登録されています。',
                'period.required' => '時限を入力してください。',
                'period.integer' => '時限は数字で入力してください。',
                'period.min' => '時限は1以上で入力してください。',
                'title.required' => '授業名を入力してください。',
                'title.max' => '授業名は255文字以内で入力してください。',
                'room.max' => '教室は255文字以内で入力してください。',
            ]
        );

        TimetableEntry::create($validated);

        return redirect('/entries');
    }
}
   

