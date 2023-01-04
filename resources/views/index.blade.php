@extends('layouts.caci')
@section('title','Accueil')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                items: 3,
                loop: true,
                margin: 20,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true
            });

        })
    </script>
@endsection

@section('content')


    <div class="landing-page  py-5 my-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 text-md-start vstack gap-3 justify-content-center text-center order-last order-md-first">

                    <h1 class="display-4 fw-bolder">Bienvenue Dans <span class="text-primary">CACI</span> <span class="text-warning">WEB</span></h1>

                    <p class="text-muted lh-lg">vous trouvez des leçons, des exercices et tout ce qui est nouveau dans le développement Web</p>
                    <button class="btn btn-lg btn-warning px-4 text-light align-self-start">Explore plus</button>
                </div>
                <div class="col-md-7">
                    <img src="{{asset('imgs/landing-page.svg')}}" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Start Features -->

    <section class="features py-5">

        <div class="container">

            <h3 class="fw-bold">Caractéristiques</h3>

            <div class="row my-5 gy-5 gy-md-0 py-5">

                <div class="col-md-4">
                    <div class="card p-4 border-0 rounded-4  shadow-sm">
                        <div class="card-body vstack gap-4 align-items-center">
                            <div class="rounded-circle bg-primary-subtle text-primary p-4">
                                <i class="fa fa-paperclip fa-3x"></i>
                            </div>
                            <h4 >Semestres</h4>
                            <p class="text-muted text-center">Chaque Semestre contient des modules</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card  p-4 border-0 rounded-4 text-bg-primary text-light shadow-sm">
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

    <!-- Start Semesters -->

    <section class="semesters">


        <div class="container">


            @foreach($semesters as $semster)
             @if(count($semster->modules))
                    <div class="{{$semster->title}} my-5">




                    <h3 class="text-bg-warning w-auto rounded-pill text-light mb-5 p-3 text-center">{{$semster->title}}</h3>
                    <div class="owl-carousel owl-theme">


                        @foreach($semster->modules as $module)


                             <div class="item">

                                 <div class="card shadow ">
                                     <div class="card-body vstack gap-3 align-items-center">
                                         <img src="{{asset('storage/' . $module -> thumbnail)}}" alt="{{$module->title}}" class="img-fluid" style="height: 250px">
                                         <h4>{{$module->title}}</h4>
                                         <div>
                                             <span class="badge-pill badge bg-dark">Leçons {{count($module->lessons)}}</span>
                                             <span class="badge-pill badge bg-dark">Exercices {{count($module->lessons)}}</span>
                                         </div>
                                         <a href="{{url('modules/' . $module->title)}}" class="stretched-link"></a>
                                     </div>
                                 </div>

                             </div>




                        @endforeach

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
