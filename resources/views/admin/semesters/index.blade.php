@extends('admin.layouts.app')
@section('title','Semesters')
@section('content')

    <div class="container-fluid">

        <form action="{{route('semesters.store')}}" method="POST" class="mb-5">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control" name="title" placeholder="Entrer Le Semestre" aria-label="Semestre" aria-describedby="button-addon2">
                <button class="btn btn-primary" type="submit" id="button-addon2">Ajouter</button>
            </div>

            @error('title')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </form>




        <x-forms.table :object="$semesters">

            <x-slot name="thead">

                <tr>
                    <th>Nom</th>
                    <th>Modules</th>
                    <th>Créer Par</th>
                    <th>Créer </th>
                    <th>Modifier</th>
                    <th>Procedures</th>
                </tr>

            </x-slot>

            <x-slot name="tbody">

                @foreach($semesters as $semester)

                    <tr>
                        <td>{{$semester->title}}</td>
                        <td>{{count($semester->modules)}}</td>
                        <td>{{$semester->user->name}}</td>
                        <td>{{$semester->created_at}}</td>
                        <td>{{$semester->updated_at}}</td>

                        <td class="d-flex justify-content-center">
                            <a href="{{route('semesters.edit',$semester)}}" class="btn btn-success me-2">Editer</a>
                            <form id="destroy-form" action="{{route('semesters.destroy',$semester)}}" method="POST" onsubmit="return confirm('Tu es Sur ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>

                @endforeach

            </x-slot>

        </x-forms.table>


    </div>

@endsection
