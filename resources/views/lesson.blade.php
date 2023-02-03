@extends('layouts.app')
@section('title',$lesson->title)

@section('styles')
    @livewireStyles
@endsection

@section('content')

<section class="lesson">



    <div class="container my-5">

        <div class="row">
            <div class="col-md-8">
                <h1 class="mb-3">{{$lesson->title}}</h1>

                {!! $lesson->content !!}

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

            <div class="col-md-4">
                <h3 class="mb-5">Autres Lesson</h3>
                <div class="row gy-4">

                    @foreach($lesson->module->lessons as $lesson)

                        <div class="card">
                            <div class="card-body vstack gap-4">

                                <h3 class="text-center">{{$lesson->title}}</h3>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>{{date_format($lesson->created_at,'Y-m-d')}}</span>
                                    <a href="{{url('modules/' . $lesson->module->title . '/' . $lesson -> title)}}" class="stretched-link"></a>
                                </div>

                            </div>
                        </div>

                    @endforeach

                </div>
            </div>




            <div class="col-md-8">
                <livewire:comment/>
            </div>

        </div>


    </div>

</section>

@endsection

@section('scripts')
    @livewireScripts
@endsection
