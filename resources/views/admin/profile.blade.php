@extends('admin.layouts.app')
@section('title','Profile')
@section('icon','bi bi-person-lines-fill')
@section('content')



    @include('admin.layouts.success')
    @include('admin.layouts.failed')

    <div class="row g-3 align-items-center">

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <form action="{{route('updateProfile')}}" method="POST" onsubmit="return confirm('tu es sure ?')">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom et Prénom</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$user -> name}}">
                            @error('name')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Email</label>
                            <input type="text" name="email" id="name" class="form-control" value="{{$user -> email}}">
                            @error('email')
                            <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>

                        <button class="btn btn-primary w-100">Modifier Information</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">

                <div class="card-body d-flex align-items-center">

                    <img src="{{File::exists('storage/' . $user -> avatar) ? asset('storage/' . $user -> avatar) : asset('imgs/logo.svg') }}" alt="" class="me-3 rounded-circle" style="object-fit: cover ; height: 150px ; width: 150px">

                    <form action="{{route('updateImage')}}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('{{__('forms.you-sure')}}')">
                        @csrf
                        @method('PATCH')


                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control" value="{{old('image')}}">
                            @error('image')
                            <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>

                        <button class="btn btn-warning w-100">Editer Image</button>
                    </form>

                </div>

            </div>

        </div>


        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{route('updatePassword')}}" method="POST" onsubmit="return confirm('{{__('forms.you-sure')}}')">

                        @csrf

                        <div class="mb-3">
                            <label for="actual_password" class="form-label">Mot de passe actuel</label>
                            <input type="password" name="actual_password" id="actual_password" class="form-control" value="{{old('actual_password')}}">
                            @error('actual_password')
                            <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">Nouveau mot de passe</label>
                            <input type="password" name="new_password" id="new_password" class="form-control" value="{{old('new_password')}}">
                            @error('new_password')
                            <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Confirmation du nouveau mot de passe</label>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" value="{{old('new_password_confirmation')}}">
                            @error('new_password_confirmation')
                            <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>



                        <button class="btn btn-primary w-100">Editer Mot de Passe</button>

                    </form>

                </div>
            </div>
        </div>

    </div>


@endsection
