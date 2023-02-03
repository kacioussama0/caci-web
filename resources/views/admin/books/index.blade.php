@extends('admin.layouts.app')
@section('title','Livres')
@section('content')

    <div class="container-fluid">


        <a href="{{route('books.create')}}" class="btn btn-lg btn-primary mb-5">Ajouter Livre</a>


        <x-forms.table :object="$books">

            <x-slot name="thead">
                <th>Titre</th>
                <th>Image De Livre</th>
                <th>Créer Par</th>
                <th>Créer </th>
                <th>Modifier</th>
                <th>Procedures</th>

            </x-slot>

            <x-slot name="tbody">
                @foreach($books as $book)

                    <tr>
                        <td>{{$book->name}}</td>
                        <td>
                            <img src="{{asset('storage/' . $book->thumbnail)}}" alt="" style="width: 50px" class="img-fluid">
                        </td>
                        <td>{{$book->user->name}}</td>
                        <td>{{$book->created_at}}</td>
                        <td>{{$book->updated_at}}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{route('books.edit',$book)}}" class="btn btn-success me-2">Editer</a>
                                <form id="destroy-form" action="{{route('books.destroy',$book)}}" method="POST" onsubmit="return confirm('Tu es Sur ?')">
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
