<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\File;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{



    public function index()
    {
        $books = Book::all();

        return view('admin.books.index',compact('books'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'thumbnail' => 'required|image|max:'. 1024 * 3,
        ]);

        $thumbnail = $request -> file('thumbnail')->store('books/thumbnail','public');

        $tmpFile = TemporaryFile::where('folder',$request->filepond)->first();

        if($tmpFile) {
            Storage::copy('attachments/tmp/' . $tmpFile ->folder . '/' . $tmpFile -> file ,'public/books/' . $tmpFile ->folder . '/' . $tmpFile -> file);

            Book::create([
                'name' => $request -> name,
                'thumbnail' => $thumbnail,
                'book' => $tmpFile->folder  . '/' . $tmpFile -> file,
                'user_id' => auth()->id()
            ]);

            Storage::delete('attachments/tmp' . $tmpFile -> folder);
            $tmpFile -> delete();
        }

        return redirect()->to('admin/books')->with(
            ['success' => 'Livre ajouter avec succès']
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }


    public function books() {
        $books = Book::latest()->get();

        return view('books',compact('books'));
    }

}
