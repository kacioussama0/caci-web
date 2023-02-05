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


    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('#attachments');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);


        FilePond.setOptions({
            name: 'attachments',
            server: {
                process: '/tmp-upload',
                revert: '/tmp-remove',
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            }
        });
    </script>


@endsection

@section('content')

    <div class="container">

        <form action="{{route('lessons.store')}}" method="POST" class="mb-5" enctype="multipart/form-data">

            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Contenu</label>
                <textarea name="content" id="content" class="form-control">{!! old('content') !!}</textarea>
                @error('content')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="module" class="form-label">Module</label>

                <select name="module" id="module" class="form-select">
                    <option value="" selected disabled>Selectioner Module</option>
                    @foreach($modules as $module)
                        <option value="{{$module->id}}">{{$module->title}}</option>
                    @endforeach
                </select>

                @error('module')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="mb-5">
                <label for="attachments" class="form-label">Attachments</label>
                <input type="file" id="attachments" multiple name="attachments[]"/>
            </div>



            <button type="submit" class="btn btn-primary w-100 add-lesson">Ajouter Leçon</button>

        </form>


    </div>

@endsection




