<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('student')){
            return view('Student.studentdash');
        }elseif(Auth::user()->hasRole('teacher')){
            return view('Teacher.teacherdash');
        }elseif(Auth::user()->hasRole('admin')){
            return view('admindash');
        }
    }

    public function Studentprofile(){

        return view('Student.studentprofile');
    }

    public function Teacherprofile(){
        return view('Teacher.teacherprofile');
    }

    public function ManageTest(){
        return view('Teacher.managetest');
    }

}
