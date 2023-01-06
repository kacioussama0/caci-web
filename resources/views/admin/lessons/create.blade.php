@extends('admin.layouts.app')

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
                <label for="semester" class="form-label">Module</label>

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


            <button class="btn btn-primary w-100">Ajouter Leçon</button>

        </form>




    </div>

@endsection

@section('scripts')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        const watchdog = new CKSource.EditorWatchdog();

        window.watchdog = watchdog;

        watchdog.setCreator( ( element, config ) => {
            return CKSource.Editor
                .create( element, config )
                .then( editor => {




                    return editor;
                } )
        } );

        watchdog.setDestructor( editor => {



            return editor.destroy();
        } );

        watchdog.on( 'error', handleError );

        watchdog
            .create( document.querySelector( '#content' ), {

                licenseKey: '',



            } )
            .catch( handleError );

        function handleError( error ) {
            console.error( 'Oops, something went wrong!' );
            console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
            console.warn( 'Build id: ps84xgvebphl-dsvl5yemqhny' );
            console.error( error );
        }

    </script>
@endsection
