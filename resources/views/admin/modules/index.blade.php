@extends('admin.layouts.app')

@section('content')

    <div class="container">


        <a href="{{route('modules.create')}}" class="btn btn-lg btn-primary mb-5">Ajouter Module</a>

        @include('layouts.success')

        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
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
                </thead>

                <tbody>
                    @foreach($modules as $module)

                       <tr>
                           <td>{{$module->title}}</td>
                           <td>{{$module->semester->title}}</td>
                           <td>{{count($module->lessons)}}</td>
                           <td>
                               <img src="{{asset('storage/' . $module->thumbnail)}}" alt="" class="img-fluid">
                           </td>
                           <td>{{$module->user->name}}</td>
                           <td>{{$module->created_at}}</td>
                           <td>{{$module->updated_at}}</td>

                           <td>
                               <a href="{{route('modules.edit',$module)}}" class="btn btn-success me-2">Editer</a>
                               <form id="destroy-form" action="{{route('modules.destroy',$module)}}" method="POST" onsubmit="return confirm('Tu es Sur ?')">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-danger">Supprimer</button>
                               </form>
                           </td>
                       </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection
