@extends('layouts.app')
@section('title',$module->title)

@section('content')

<section class="module">

    <div class="header mb-3  d-flex flex-column justify-content-center align-items-center position-relative" style="background-image: url('{{asset('storage/' . $module->thumbnail)}}')">
        <h1 class="display-4 text-center text-white bg-opacity-50">{{$module->title}}</h1>
        <p class="container text-white text-center">{{$module->description}}</p>
    </div>
@if(count($module->lessons))
    <div class="container mb-5">

        <div class="row">

            <div class="col-md-3">

                <div class="offcanvas-lg offcanvas-start">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <nav class="bd-links w-100" id="bd-docs-nav" aria-label="Docs navigation">
                            <h3 class="fw-bold mb-3">Cours</h3>
                            <ul class="bd-links-nav list-unstyled mb-0 pb-3 pb-md-2 pe-lg-2">
                                @foreach($module->lessons as $lesson)
                                    <li class="btn btn-outline-primary position-relative   @if(request()->is('modules/' . $module->slug . '/' . $lesson -> slug)) active fw-bold @endif mb-3">
                                        @if(request()->is('modules/' . $module->slug . '/' . $lesson -> slug))   <span class="bg-warning d-block rounded-circle position-absolute start-0 top-0 translate-middle" style="width: 15px ; height: 15px"></span> @endif
                                        <a href="{{url('modules/' . $module->slug . '/' . $lesson -> slug)}}" class="   text-decoration-none text-black ">{{$lesson->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>


            <div class="row col-md-9">

                <h1 class="my-5">{{$lesson->title}}</h1>

                <div class="content w-100">
                    {!! $lesson->content !!}
                </div>

                <h3>Attachments</h3>



                <x-forms.table :object="$lesson->files">

                    <x-slot name="thead">
                        <th>Fichier</th>
                        <th>Action</th>
                    </x-slot>

                    <x-slot name="tbody">
                        @foreach($lesson->files as $file)
                            <tr>
                                <td>{{explode('/',$file->path)[1]}}</td>
                                <th><a href="{{asset('storage/attachments/' . $file -> path)}}" download class="btn btn-primary">Telecharger</a></th>
                            </tr>
                        @endforeach
                    </x-slot>

                </x-forms.table>

            </div>

        </div>


        @else

            <div class="alert alert-danger container">
                <h3 class="display-1 text-center">Vide</h3>
            </div>

        @endif




    </div>

</section>

@endsection
