@php

@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Start Meta Tags -->
    <meta charset="UTF-8">
    <meta name="theme-color" content="#62259933">
    <link rel='icon' href='{{asset('assets/imgs/logo.svg')}}'>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- End Meta Tags -->

    <title>{{config('app.name')}} | @yield('title')</title>
    <link rel="icon" href="{{asset('imgs/logo.svg')}}">

    <!-- Start Links Tags  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/admin.rtl.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <!-- End Links Tags  -->

    @yield('styles')

<body>



<!-- Start Side Bar -->

<div id="app" >
    @include('admin.layouts.side')
</div>

<!-- End Side Bar -->


<!-- Start Content -->

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading  d-flex justify-content-between flex-column flex-md-row align-items-center">
        <h3 class="mb-5 mb-md-0"><i class="@yield('icon')"></i> @yield('title')</h3>


        <a href="{{url('/')}}" class="text-decoration-none"><i class="bi bi-arrow-return-right mx-2   align-middle"></i>Retour au site</a>
        <div class="d-flex d-block align-items-center">
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="link-primary btn"><i class="bi bi-box-arrow-in-left me-1 align-middle"></i>Deconnexion</button>
            </form>
        </div>
    </div>





    @yield('content')


    <!-- End Content -->


@include('admin.layouts.footer')
