@extends('admin.layouts.app')
@section('title','Exercices')
@section('content')

    <div class="container-fluid">


        <a href="{{route('exercices.create')}}" class="btn btn-lg btn-primary mb-5">Ajouter Exercice</a>

        <x-forms.table :object="$exercices">

            <x-slot name="thead">

                <th>Nom</th>
                <th>Module</th>
                <th>Créer Par</th>
                <th>Créer </th>
                <th>Modifier</th>
                <th>Procedures</th>

            </x-slot>

            <x-slot name="tbody">

                @foreach($exercices as $exercice)

                    <tr>
                        <td>{{$exercice->title}}</td>
                        <td>{{$exercice->module->title}}</td>
                        <td>{{$exercice->user->name}}</td>
                        <td>{{$exercice->created_at}}</td>
                        <td>{{$exercice->updated_at}}</td>
                        <td>
                            <a href="{{route('exercices.edit',$exercice)}}" class="btn btn-success me-2">Editer</a>
                            <form id="destroy-form" action="{{route('exercices.destroy',$exercice)}}" method="POST" onsubmit="return confirm('Tu es Sur ?')">
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
