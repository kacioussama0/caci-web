<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function uploadMultiple(Request $request) {

        if($request->hasFile('attachments')) {
            $attachment =  $request -> file('attachments');
            $file_name =   $attachment -> getClientOriginalName();
            $folder = uniqid('',true);
            $attachment->storeAs('attachments/tmp/' . $folder , $file_name);

            TemporaryFile::create([
                'folder' => $folder,
                'file' => $file_name
            ]);

            return $folder;
        }

        return '';

    }


    public function  delete() {
        $tmpFile = TemporaryFile::where('folder',request()->getContent())->first();
        Storage::deleteDirectory('attachments/tmp/' . $tmpFile -> folder);
        $tmpFile -> delete();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
