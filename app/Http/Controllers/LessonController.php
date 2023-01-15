<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Http\Request;

class LessonController extends Controller
{

    public function index()
    {
        $lessons = Lesson::latest()->get();

        return view('admin.lessons.index',compact('lessons'));

    }


    public function create()
    {
        $modules = Module::all();
        return view('admin.lessons.create',compact('modules'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'module' => 'required|integer'
        ]);

        Lesson::create([
            'title' => $request->title,
            'content' => $request['content'],
            'user_id' => auth()->id(),
            'module_id' => $request->module
        ]);

        return redirect()->to('admin/lessons')->with(
            ['success' => 'Leçon ajouter avec succès']
        );

    }


    public function show(Lesson $lesson)
    {
        //
    }



    public function edit(Lesson $lesson)
    {
        $modules = Module::all();
        return view('admin.lessons.edit',compact('modules','lesson'));
    }



    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'module' => 'required|integer'
        ]);

        $lesson->update([
            'title' => $request->title,
            'content' => $request['content'],
            'module_id' => $request->module
        ]);

        return redirect()->to('admin/lessons')->with(
            ['success' => 'Leçon modifier avec succès']
        );

    }



    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->to('admin/lessons')->with(
            ['success' => 'Leçon supprimer avec succès']
        );
    }


    public function upload(Request $request) {
        if($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file -> getClientOriginalName();
            $path = $file->storeAs('public/attachments',$fileName);
        }

        if($path) {
            return response()->json(['success' => 'uploaded successfully'],200);
        }
    }
}
