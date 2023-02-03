@extends('admin.layouts.app')
@section('title','Leçons')
@section('content')

    <div class="container-fluid">


        <a href="{{route('lessons.create')}}" class="btn btn-lg btn-primary mb-5">Ajouter Leçon</a>


        <x-forms.table :object="$lessons">

            <x-slot name="thead">

                <th>Nom</th>
                <th>Module</th>
                <th>Créer Par</th>
                <th>Créer </th>
                <th>Modifier</th>
                <th>Procedures</th>

            </x-slot>

            <x-slot name="tbody">
                @foreach($lessons as $lesson)

                    <tr>
                        <td>{{$lesson->title}}</td>
                        <td>
                            <img src="{{asset('storage/' . $lesson->module->thumbnail)}}" alt="" style="width: 50px" class="img-fluid">

                            {{$lesson->module->title}}
                        </td>
                        <td>{{$lesson->user->name}}</td>
                        <td>{{$lesson->created_at}}</td>
                        <td>{{$lesson->updated_at}}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{route('lessons.show',$lesson)}}" class="btn btn-primary me-2">Afficher</a>
                                <a href="{{route('lessons.edit',$lesson)}}" class="btn btn-success me-2">Editer</a>
                                <form id="destroy-form" action="{{route('lessons.destroy',$lesson)}}" method="POST" onsubmit="return confirm('Tu es Sur ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                @endforeach
            </x-slot>

        </x-forms.table>




    </div>

@endsection
