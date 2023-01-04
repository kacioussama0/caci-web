<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Module;
use App\Models\Semester;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index() {
        $semesters = Semester::all();
        return view('index')
            ->with('semesters',$semesters);
    }

    public function module($title) {
        $module = Module::where('title',$title)->first();
        return view('module',compact('module'));
    }

    public function lesson($title,$lesson) {

        $lesson = Lesson::where('title',$lesson)->first();

        if(empty($lesson)) {
            return redirect()->to('modules/' . $title);
        }

       return view('lesson',compact('lesson'));


    }
}
