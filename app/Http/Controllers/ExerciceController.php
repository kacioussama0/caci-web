<?php

namespace App\Http\Controllers;

use App\Models\Exercice;
use App\Models\Module;
use Illuminate\Http\Request;

class ExerciceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercices = Exercice::latest()->get();
        return view('admin.exercices.index',compact('exercices'));
    }



    public function create()
    {
        $modules = Module::all();
        return view('admin.exercices.create',compact('modules'));
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Exercice $exercice)
    {
        //
    }


    public function edit(Exercice $exercice)
    {
        //
    }

    public function update(Request $request, Exercice $exercice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exercice  $exercice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercice $exercice)
    {
        //
    }
}
