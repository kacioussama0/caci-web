@extends('admin.layouts.app')
@section('title','Ajouter Module')
@section('content')

    <div class="container-fluid">

        <form action="{{route('modules.store')}}" method="POST" class="mb-5" enctype="multipart/form-data">

            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titre <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control">{{old('description')}}</textarea>
                @error('description')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="semester" class="form-label">Semestre <span class="text-danger">*</span></label>

                <select name="semester" id="semester" class="form-select">
                    <option value="" selected disabled>Selectioner Semstre</option>
                    @foreach($semesters as $semester)
                        <option value="{{$semester->id}}">{{$semester->title}}</option>
                    @endforeach
                </select>

                @error('semester')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="mb-3">
                <label for="thumbnail" class="form-label">Image <span class="text-danger">*</span></label>
                <input type="file" name="thumbnail" id="thumbnail" class="form-control" value="{{old('thumbnail')}}">

                @error('thumbnail')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="coefficient" class="form-label">Coefficient <span class="text-danger">*</span></label>
                <input type="number" name="coefficient" id="coefficient" class="form-control" value="{{old('coefficient')}}">

                @error('coefficient')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <button class="btn btn-primary w-100">Ajouter Module</button>

        </form>


    </div>

@endsection


