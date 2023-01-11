@extends('admin.layouts.app')
@section('title','Modifier Module')
@section('content')

    <div class="container-fluid">

        <form action="{{route('modules.update',$module)}}" method="POST" class="mb-5" enctype="multipart/form-data">

            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" name="title" id="title" class="form-control" value="{{$module->title}}">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control">{{$module->description}}</textarea>
                @error('description')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="semester" class="form-label">Semestre</label>

                <select name="semester" id="semester" class="form-select">
                    <option value="" selected disabled>Selectioner Semstre</option>
                    @foreach($semesters as $semester)
                        <option value="{{$semester->id}}" @if($module->semester_id == $semester->id) selected @endif>{{$semester->title}}</option>
                    @endforeach
                </select>

                @error('semester')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="mb-3">
                <label for="thumbnail" class="form-label">Image</label>
                <input type="file" name="thumbnail" id="thumbnail" class="form-control" value="{{old('thumbnail')}}">

                @error('thumbnail')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <img src="{{asset('storage/' . $module->thumbnail)}}" alt="" width="100">

            <div class="mb-3">
                <label for="coefficient" class="form-label">Coefficient</label>
                <input type="number" name="coefficient" id="coefficient" class="form-control" value="{{$module->coefficient}}">

                @error('coefficient')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <button class="btn btn-primary w-100">Editer Module</button>

        </form>




    </div>

@endsection
