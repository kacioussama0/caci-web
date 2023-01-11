<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class ModuleController extends Controller
{


    public function index()
    {
        if(count(Semester::all())) {
            $modules = Module::latest()->get();
            return view('admin.modules.index',compact('modules'));
        }
        return redirect()->to('admin/semesters');
    }


    public function create()
    {
        $semesters = Semester::all();
        return view('admin.modules.create',compact('semesters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'semester' => 'required',
            'coefficient' => 'required|integer',
            'thumbnail' => [
                'required',
                File::image()->max(5*1024)
            ]
        ]);

        $thumbnail = $request->file('thumbnail')->store('modules','public');

        Module::create([

            'title' => $request->title,
            'description' => $request->description,
            'coefficient' => $request->coefficient,
            'thumbnail' => $thumbnail,
            'semester_id' => $request->semester,
            'user_id' => auth()->id()
        ]);

        return redirect()->to('admin/modules')->with(
            ['success' => 'Module ajouter avec succès']
        );

    }


    public function show(Module $module)
    {
        //
    }


    public function edit(Module $module)
    {
        $semesters = Semester::all();
        return view('admin.modules.edit',compact('semesters','module'));
    }


    public function update(Request $request, Module $module)
    {
        $request->validate([
            'title' => 'required',
            'semester' => 'required',
            'coefficient' => 'required|integer',
            'thumbnail' => [
                File::image()->max(5*1024)
            ]
        ]);

        $thumbnail = '';

        if(!empty($request->file('thumbnail'))) {
            $thumbnail = $request->file('thumbnail')->store('modules','public');
        }

        $module->update([

            'title' => $request->title,
            'description' => $request->description,
            'coefficient' => $request->coefficient,
            'thumbnail' => $thumbnail ? $thumbnail : $module->thumbnail,
            'semester_id' => $request->semester,
        ]);

        return redirect()->to('admin/modules')->with(
            ['success' => 'Module modifier avec succès']
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {

        if(count($module->lessons)) {
            return redirect()->to('admin/modules')->with([
                'failed' => 'Il ne peut pas être supprimé le module car il contient des leçons'
            ]);
        }

        $module->delete();

        return redirect()->to('admin/modules')->with(
            ['success' => 'Module supprimer avec succès']
        );
    }
}
