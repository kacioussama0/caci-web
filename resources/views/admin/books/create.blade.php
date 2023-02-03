@extends('admin.layouts.app')


@section('scripts')

    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[id="book"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);


        FilePond.setOptions({
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

        <form action="{{route('books.store')}}" method="POST" class="mb-5" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Titre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>



            <div class="mb-5">
                <label for="thumbnail" class="form-label">Image De Livre</label>
                <input type="file" class="form-control" name="thumbnail"/>
                @error('thumbnail')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>



            <div class="mb-5">
                <label for="book" class="form-label">Livre</label>
                <input type="file" id="book"/>

            </div>



            <button type="submit" class="btn btn-primary w-100">Ajouter Livre</button>

        </form>


    </div>

@endsection




