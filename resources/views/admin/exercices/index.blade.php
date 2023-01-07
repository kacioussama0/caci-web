@extends('admin.layouts.app')

@section('content')

    <div class="container">


        <a href="{{route('lessons.create')}}" class="btn btn-lg btn-primary mb-5">Ajouter Leçon</a>

        @include('layouts.success')

        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Module</th>
                        <th>Créer Par</th>
                        <th>Créer </th>
                        <th>Modifier</th>
                        <th>Procedures</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($lessons as $lesson)

                       <tr>
                           <td>{{$lesson->title}}</td>
                           <td>{{$lesson->module->title}}</td>
                           <td>{{$lesson->user->name}}</td>
                           <td>{{$lesson->created_at}}</td>
                           <td>{{$lesson->updated_at}}</td>
                           <td>
                               <a href="{{route('lessons.edit',$lesson)}}" class="btn btn-success me-2">Editer</a>
                               <form id="destroy-form" action="{{route('lessons.destroy',$lesson)}}" method="POST" onsubmit="return confirm('Tu es Sur ?')">
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
