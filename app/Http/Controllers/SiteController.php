<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Module;
use App\Models\Semester;
use Illuminate\Http\Request;

class SiteController extends Controller
{


    public  function tools() {
        return view('tools');
    }

    public function index() {
        $semesters = Semester::all();
        $lessons = Lesson::latest()->take(6)->get();
        return view('index')
            ->with('semesters',$semesters)
        ->with('lessons',$lessons);
    }

    public function module($module) {

        $module = Module::where('slug',$module)->first();

        if(empty($module)) {
            return  redirect()->to('modules');
        }

        return view('module',compact('module'));

    }

    public function lesson($title,$lesson) {

        $lesson = Lesson::where('slug',$lesson)->first();

        if(empty($lesson)) {
            return redirect()->to('modules/' . $lesson);
        }

       return view('lesson',compact('lesson'));


    }

    public function modules() {
        $modules = Module::latest()->get();
        return view('modules',compact('modules'));
    }


    public function switchMode() {
        if(session()->get('mode') == 'light') {
            session()->put('mode','dark');
        }else {
            session()->put('mode','light');
        }

        return redirect()->to('/');
    }
}
