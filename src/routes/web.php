<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\TimetableEntryController; 

Route::get('/timetable', [
    TimetableController::class, 'index'
]);

Route::get('/entries', [
    TimetableEntryController::class, 'index'
]);

// 登録フォームを表示する
Route::get('/entries/create', [
    TimetableEntryController::class, 'create'
]);

// フォームから送られたデータを保存する
Route::post('/entries', [
    TimetableEntryController::class, 'store'
]);