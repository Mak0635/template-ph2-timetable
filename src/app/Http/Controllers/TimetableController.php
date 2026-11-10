<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TimetableController extends Controller
{
    public function index()
    {
        
    $courses = DB::select('
    
        SELECT period, name, teacher, room
        FROM courses
        WHERE day = ?
        ORDER BY period ASC
    
    ', [1]);



    $requiredCourses = DB::select('

        SELECT name, credits
        FROM courses
        WHERE required = ?
        ORDER BY code

    ', [true]) ;

        return view('timetable', [
        'courses' => $courses,
        'requiredCourses' => $requiredCourses,
        ]);
    } 
}
    



