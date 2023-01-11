@extends('admin.layouts.app')
@section('title', 'Ajouter Utilisateur')
@section('icon','bi bi-people-fill')



@section('content')

    <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label for="name">Nom et Prénom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email"  name="email" id="email" class="form-control" value="{{old('email')}}">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password">Mot De Passe</label>
            <input type="password"  name="password" id="password" class="form-control" value="{{old('password')}}">
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>


        <div class="mb-3">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-select">
                <option value="Moderator">Moderator</option>
                <option value="Teacher">Enseignant</option>
                <option value="Student">Elève</option>
            </select>
            @error('type')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>


        <div class="mb-3 form-check form-switch">
            <input type="checkbox" class="form-check-input" name="approved">
            <label for="approved" class="form-check-label">Approuvé</label>
        </div>


        <button class="btn btn-primary w-100 mt-3">Ajouter</button>

    </form>





@endsection
