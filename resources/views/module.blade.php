@extends('layouts.caci')
@section('title',$module->title)


@section('content')

<section class="module ">

    <div class="header mb-3  d-flex flex-column justify-content-center align-items-center position-relative" style="background-image: url('{{asset('storage/' . $module->thumbnail)}}')">
        <h1 class="display-5 text-center text-white mb-3 bg-opacity-50">{{$module->title}}</h1>
        <p class="container text-white text-center">{{$module->description}}</p>
    </div>

    <div class="container mb-5">


        <div class="row">

           @foreach($module->lessons as $lesson)

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body vstack gap-4">
                            <img src="{{asset('storage/' . $module -> thumbnail)}}" alt="{{$module->title}}" class="img-fluid" style="height: 250px">

                            <h3 class="text-center">{{$lesson->title}}</h3>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>{{date_format($lesson->created_at,'Y-m-d')}}</span>
                                <span class="badge-pill badge bg-dark">Exercices {{count($module->lessons)}}</span>
                                <a href="{{url('modules/' . $module->title . '/' . $lesson -> title)}}" class="stretched-link"></a>
                            </div>

                        </div>
                    </div>
                </div>

            @endforeach

        </div>

    </div>

</section>

@endsection
