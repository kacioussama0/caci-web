@extends('layouts.app')
@section('title','Modules')

@section('content')

<section class="module">

    <div class="header mb-3  d-flex flex-column justify-content-center align-items-center position-relative" >
        <h1 class="display-4 text-center text-white bg-opacity-50">Modules</h1>
    </div>

    <div class="container mb-5">
        <div class="row g-5">
            @foreach($modules as $module)
                <div class="col-md-4">

                    <div class="card shadow border-0">
                        <div class="card-body vstack gap-3 align-items-center">
                            <img src="{{asset('storage/' . $module -> thumbnail)}}" alt="{{$module->title}}" class="img-fluid" style="height: 250px">
                            <h4>{{$module->title}}</h4>
                            <div>
                                <span class="badge-pill badge bg-dark">Leçons {{count($module->lessons)}}</span>
                            </div>
                            <a href="{{url('modules/' . $module->slug)}}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</section>

@endsection
