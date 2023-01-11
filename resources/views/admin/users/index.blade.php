@extends('admin.layouts.app')
@section('title','Utilisateurs')
@section('icon','bi bi-people-fill')



@section('content')


        <a href="{{route('users.create')}}" class="btn btn-lg btn-primary mb-4">Ajouter Utilisateur</a>





        <x-forms.table :object="$users">

            <x-slot name="thead">

                <tr>
                    <th>Nom et Prénom</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Type</th>
                    <th>Crée</th>
                    <th>Procedures</th>
                </tr>

            </x-slot>


            <x-slot name="tbody">

                @foreach($users as $user)

                    <tr>
                        <td>{{$user -> name}}</td>
                        <td>{{$user -> email}}</td>
                        <td>
                            <img src="{{File::exists(public_path('storage/' . $user->avatar)) ?
                            asset('storage/' . $user -> avatar) : asset('imgs/logo.svg')}}" alt="" style="width: 80px ; height:80px" class="rounded-circle">
                        </td>

                        <td>{{$user -> type}}</td>
                        <td>{{$user -> created_at}}</td>
                        <td>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                {{__('forms.procedures')}}
                            </button>
                            <ul class="dropdown-menu">
                                <li> <a href="{{route('users.edit',$user)}}"  class="dropdown-item">{{__('forms.edit')}}</a></li>
                                <li>
                                    <form action="{{route('users.destroy',$user)}}" method="POST" onsubmit="return confirm('{{__('forms.you-sure')}}')" class="d-inline-block w-100">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item">{{__('forms.delete')}}</button>

                                    </form>
                                </li>


                            </ul>
                        </td>
                    </tr>

                @endforeach


            </x-slot>

        </x-forms.table>




@endsection
