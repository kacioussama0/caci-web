@extends('admin.layouts.app')
@section('title','Modules')
@section('content')

    <div class="container-fluid">


        <a href="{{route('modules.create')}}" class="btn btn-lg btn-primary mb-5">Ajouter Module</a>




        <x-forms.table :object="$modules">

            <x-slot name="thead">
                <tr>
                    <th>Nom</th>
                    <th>Semestre</th>
                    <th>Leçons</th>
                    <th>Image</th>
                    <th>Créer Par</th>
                    <th>Créer </th>
                    <th>Modifier</th>
                    <th>Procedures</th>
                </tr>
            </x-slot>

            <x-slot name="tbody">

                @foreach($modules as $module)

                    <tr>
                        <td>{{$module->title}}</td>
                        <td>{{$module->semester->title}}</td>
                        <td>{{count($module->lessons)}}</td>
                        <td>
                            <img src="{{asset('storage/' . $module->thumbnail)}}" alt="" style="width: 100px" class="img-fluid">
                        </td>
                        <td>{{$module->user->name}}</td>
                        <td>{{$module->created_at}}</td>
                        <td>{{$module->updated_at}}</td>

                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{route('modules.edit',$module)}}" class="btn btn-success me-2">Editer</a>
                                <form id="destroy-form" action="{{route('modules.destroy',$module)}}" method="POST" onsubmit="return confirm('Tu es Sur ?')">
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
