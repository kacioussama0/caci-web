<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

        $lesson = Lesson::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title,'-'),
            'content' => $request['content'],
            'user_id' => auth()->id(),
            'module_id' => $request->module
        ]);



        $tmpFile = TemporaryFile::where('folder',$request->attachments)->first();

        if($tmpFile) {
            Storage::copy('attachments/tmp/' . $tmpFile ->folder . '/' . $tmpFile -> file ,'public/attachments/' . $tmpFile ->folder . '/' . $tmpFile -> file);
            File::create([
                'lesson_id' => $lesson -> id,
                'path' => $tmpFile->folder  . '/' . $tmpFile -> file,
            ]);
            Storage::delete('attachments/tmp' . $tmpFile -> folder);
            $tmpFile -> delete();
        }

        return redirect()->to('admin/lessons')->with(
            ['success' => 'Leçon ajouter avec succès']
        );


    }


    public function show(Lesson $lesson)
    {
        return view('lesson',compact('lesson'));
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

    public function uploadImage(Request $request) {

        if($request -> hasFile('upload')) {
            $image = $request->file('upload')->store('images','public');
            return response()->json(['filename' => $image , 'uploaded' => 1 , 'url' => asset('storage/' . $image)]);
        }

    }
}
