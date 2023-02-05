@extends('admin.layouts.app')


@section('scripts')


    <script src="{{asset('ckeditor/build/ckeditor.js')}}"></script>


    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ), {

                licenseKey: '',
                language: 'fr',
                ckfinder: {
                    uploadUrl: "{{route('ckeditor.uploadImage') . '?_token=' . csrf_token()}}",

                }

            } )
            .then( editor => {
                window.editor = editor;




            } )
            .catch( error => {
                console.error( 'Oops, something went wrong!' );
                console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
                console.warn( 'Build id: qiybqic1scos-2mtgwv7b85hg' );
                console.error( error );
            } );
    </script>



@endsection

@section('content')

    <div class="container">

        <form action="{{route('lessons.update',$lesson)}}" method="POST" class="mb-5" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" name="title" id="title" class="form-control" value="{{$lesson -> title}}">
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Contenu</label>
                <textarea name="content" id="content" class="form-control tinymce">{!! $lesson -> content !!}</textarea>
                @error('content')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="semester" class="form-label">Module</label>

                <select name="module" id="module" class="form-select" value="{{$lesson->module_id}}">
                    <option value="" selected disabled>Selectioner Module</option>
                    @foreach($modules as $module)
                        <option value="{{$module->id}}" @if($lesson -> module_id == $module -> id) selected @endif>{{$module->title}}</option>
                    @endforeach
                </select>

                @error('module')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <button class="btn btn-primary w-100">Modifier Leçon</button>

        </form>




    </div>

@endsection
