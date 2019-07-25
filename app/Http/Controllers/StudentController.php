<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return view('student/index',['students' => $students]);
    }

    public function get_detail_id_2(){
        $students_id_2 = Student::where('id',2)->get();;
        return view('admin.class',['studen_id_2'=> $students_id_2]);
    }
}
