@extends('admin.layouts.app')
@section('title', 'Modifier Utilisateur')
@section('icon','bi bi-people-fill')



@section('content')

    <form action="{{route('users.update',$user)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Nom et Prénom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$user -> name}}">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email"  name="email" id="email" class="form-control" value="{{$user -> email}}">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>




        <div class="mb-3">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-select">
                @foreach($roles as $role)
                    <option value="{{$role -> name}}">{{$role-> display_name}}</option>
                @endforeach
            </select>
            @error('type')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>


        <div class="mb-3 form-check form-switch">
            <input type="checkbox" class="form-check-input" name="approved" @if($user -> approved) checked @endif>
            <label for="approved" class="form-check-label" >Approuvé</label>
        </div>


        <button class="btn btn-primary w-100 mt-3">Modifier</button>

    </form>





@endsection
