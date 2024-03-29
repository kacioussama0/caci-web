@php
    $semesters = \App\Models\Semester::all();
@endphp
<!doctype html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}} |  @yield('title')</title>
    <link rel="icon" href="{{asset('imgs/logo.svg')}}">
    <meta name="description" content="CACI WEB, vous trouvez des leçons, des exercices et tout ce qui est nouveau dans le développement Web">
    <meta name="keywords" content="@foreach($semesters as $semester) @foreach($semester -> modules as $module){{$module -> title .  ','}}@endforeach @endforeach">
    <meta name="author" content="Kaci Oussama">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    @yield('styles')
</head>

<body @if(session()->has('mode')) data-bs-theme="{{session()->get('mode')}}" @endif>

@if(!request()->is('register'))

<!-- Start Header -->

<header>
    <nav class="navbar navbar-expand-lg py-3">
        <div class="container">
            <a class="navbar-brand" href="/" class="d-flex align-items-center">
                <img src="{{asset('imgs/logo.svg')}}" alt="" style="width: 30px" />
                <span class="text-primary fw-bold">CACI WEB</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-regular fa-bars fa-1x text-warning"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mx-auto ">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('/')}}">Accueil</a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Semestres</a>
                        <div class="dropdown-menu">
                            @foreach($semesters as $semester)
                                <a class="dropdown-item user-select-none fs-5 fw-bolder text-uppercase" >{{$semester->title}}</a>
                                @foreach($semester->modules as $key => $module)
                                    <a class="dropdown-item" href="{{url('modules/' . $module->slug)}}">{{$key+1 . ' - ' .$module->title}}</a>
                                @endforeach
                            @endforeach

                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('modules')}}">Modules</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('books')}}">Livres</a>
                    </li>

            </div>


            @auth
                <ul class="navbar-nav  ms-auto d-none d-lg-block">
                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle  btn btn-warning text-light rounded-3 border-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa-light fa-user me-1"></i>{{auth()->user()->name}}</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('admin/profile')}}">Profile</a>

                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item" href="{{route('logout')}}">Deconnexion</button>
                            </form>

                        </div>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav  ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active me-2" href="{{route('login')}}">Connexion</a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link active btn btn-warning text-light px-4 rounded-3 border-0" href="{{route('register')}}">S'inscrire</a>
                    </li>
                </ul>

            @endauth

            <ul class="navbar-nav   ms-3 d-none d-lg-block">
                <li class="nav-item dropdown">
                    <a class="nav-link  dropdown-toggle  btn btn-outline-dark    rounded-3 border-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        @if(session()->get('mode') == 'light' || session()->has('mode'))
                            <i class="fa-light fa-moon me-1"></i>Dark
                        @else
                            <i class="fa-light fa-moon me-1"></i>Light
                        @endif
                    </a>
                    <div class="dropdown-menu">
                        @if(session()->get('mode') == 'light' || session()->has('mode'))
                            <a class="dropdown-item" href="{{url('switch-mode')}}">Light</a>
                        @else
                            <a class="dropdown-item" href="{{url('switch-mode')}}" >Dark</a>
                        @endif
                    </div>
                </li>
            </ul>

        </div>
    </nav>


</header>

<!-- End Header -->


@endif

@yield('content')

@if(!request()->is('register'))

<footer class="bg-primary py-4">

    <div class="container text-white">
        <div class="d-flex justify-content-between align-items-center flex-column flex-md-row vstack gap-3">
            <img src="{{asset('imgs/logo.svg')}}" alt="" class="img-fluid" style="width: 40px">

            <div>
                <a href="https://www.facebook.com/donttryhacking.me0101" class="link-light"><i class="fa-brands fa-facebook fa-2x me-2"></i></a>
                <a href="https://github.com/kacioussama0" class="link-light" target="_blank"><i class="fa-brands fa-github fa-2x"></i></a>
            </div>

            <p class="mb-0 text-center">Tous les droits sont réservés Caci Web &copy; {{date('Y')}}</p>

        </div>
    </div>




</footer>
@endif


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="{{asset('fontawesome/js/all.min.js')}}"></script>
@yield('scripts')
</body>
</html>
