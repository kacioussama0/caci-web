<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Module;
use App\Models\Semester;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->except('index');
    }

    public function index() {
        $semesters = Semester::all();
        $lessons = Lesson::latest()->take(6)->get();
        return view('index')
            ->with('semesters',$semesters)
        ->with('lessons',$lessons);
    }

    public function module($module,$lesson = '') {

        $module = Module::where('slug',$module)->first();
        $leson = $module->lessons->first();
        if(!empty($lesson)) {
            $lesson = Lesson::where('slug',$lesson)->first();
        }

        return view('module',compact('module','lesson'));

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
