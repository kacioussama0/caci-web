<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SemesterController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:super_admin'])->only(['create','store','edit','update','destroy']);
        $this->middleware(['role:super_admin|moderator'])->only('index');
    }


    public function index()
    {



        $semesters = Semester::all();
        return view('admin.semesters.index',compact('semesters'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);


        Semester::create([
            'title' => Str::ucfirst($request->title),
            'slug' => Str::slug($request->title,"-"),
            'user_id' => auth()->id()
        ]);


        return redirect()->to('admin/semesters')->with(
            ['success' => 'Semestre ajouter avec succès']
        );

    }


    public function show(Semester $semester)
    {
        //
    }



    public function edit(Semester $semester)
    {
        $semesters = Semester::all();
        return view('admin.semesters.edit',compact('semesters','semester'));
    }



    public function update(Request $request, Semester $semester)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $semester->update([
            'title' => Str::ucfirst($request->title),
            'user_id' => auth()->id()
        ]);

        return redirect()->to('admin/semesters')->with(['success' => 'Semestre modifier avec succès']);

    }


    public function destroy(Semester $semester)
    {

        if(count($semester->modules)) {
            return redirect()->to('admin/semesters')->with([
                'failed' => 'Il ne peut pas être supprimé le module car il contient des leçons'
            ]);
        }


        $semester->delete();
        return redirect()->to('admin/semesters')->with(
            ['success' => 'Semestre supprimer avec succès']
        );

    }
}
