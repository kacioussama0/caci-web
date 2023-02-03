@extends('layouts.app')
@section('title','Accueil')


@section('content')

    <div class="landing-page py-md-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 text-md-start vstack gap-3 justify-content-center text-center order-last order-md-first">

                    <h1 class="display-4 fw-bolder">Bienvenue Dans <span class="text-primary">CACI</span> <span class="text-warning">WEB</span></h1>

                    <p class="text-muted lh-lg">vous trouvez des leçons, des exercices et tout ce qui est nouveau dans le développement Web</p>
                    <a  href="{{url('modules')}}" class="btn btn-lg btn-warning px-4 text-light align-self-center align-self-md-start">Explore plus</a>
                </div>
                <div class="col-md-7">
                    <img src="{{asset('imgs/landing-page.svg')}}" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Start Features -->

    <section class="features py-3">

        <div class="container">

            <h3 class="fw-bold w-100 text-center p-3 rounded-pill bg-primary text-light">Caractéristiques</h3>

            <div class="row my-5 gy-5 gy-md-0 py-5">

                <div class="col-md-4">
                    <div class="card p-4 border-0 rounded-4  shadow-sm">
                        <div class="card-body vstack gap-4 align-items-center">
                            <div class="rounded-circle bg-primary-subtle text-primary p-4">
                                <i class="fa fa-paperclip fa-3x"></i>
                            </div>
                            <h4>Semestres</h4>
                            <p class="text-muted text-center">Chaque Semestre contient des modules</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card  p-4 border-0 rounded-4 text-bg-primary text-light shadow">
                        <div class="card-body vstack gap-4 align-items-center ">
                            <div class="rounded-circle bg-white text-primary p-4">
                                <i class="fa-light fa-print fa-3x"></i>
                            </div>
                            <h4>Modules</h4>
                            <p class="text-center">Chaque Modules contient des lecons</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-4 border-0 rounded-4  shadow-sm">
                        <div class="card-body vstack gap-4 align-items-center">
                            <div class="rounded-circle bg-primary-subtle text-primary p-4">
                                <i class="fa fa-paperclip fa-3x"></i>
                            </div>
                            <h4>Exercices</h4>
                            <p class="text-muted text-center">Chaque Modules contient des exercices</p>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </section>

    <!-- End Features -->

    @if(count($lessons))

        <!-- Start Latest Lessons -->

    <section class="latest-lessons">
        <div class="container">

            <h3 class="mb-5 w-100 text-center p-3 rounded-pill bg-primary text-light">Derniers Leçons</h3>

            <div class="row g-5">
                @foreach($lessons as $lesson)
                    <div class="col-md-4">
                        <div class="card shadow border-0 ">
                            <div class="card-body vstack gap-3  align-items-center">
                                <h5 class="text-center ">{{\Illuminate\Support\Str::limit($lesson->title,25)}}</h5>
                                <span class="badge-pill badge bg-primary">Module:  {{$lesson -> module -> title}}</span>
                                <a href="{{url('modules/' . $lesson -> module -> slug . '/' . $lesson->slug)}}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- End Latest Lessons -->
@endif

    <!-- Start Semesters -->

    <section class="semesters">
        <div class="container">
            @foreach($semesters as $semster)

             @if(count($semster->modules))
                    <div class="{{$semster->title}} my-5">

                    <h3 class="text-bg-warning w-auto rounded-pill text-light mb-5 p-3 text-center">{{$semster->title}}</h3>


                        <div class="row g-5">

                            @foreach($semster->modules as $module)
                                <div class="col-md-4">

                                    <div class="card shadow-sm">
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
                    </div>
                </div>
                @endif
            @endforeach
            </div>
        </div>
    </section>

    <!-- End Semesters -->

@endsection

@section('scripts')

@endsection
