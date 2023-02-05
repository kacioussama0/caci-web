@extends('layouts.app')
@section('title',$module->title)

@section('content')


    <!--==========================-->
    <!--=         Banner         =-->
    <!--==========================-->
    <section class="page-banner style-light">

        <ul class="banner-pertical-two">
            <li><img src="{{asset('media/banner/header2/tree.png')}}" class="littleSquare" alt="astriol pertical"></li>
            <li><img src="{{asset('media/banner/header2/wave.png')}}" alt="astriol pertical"></li>
            <li><img src="{{asset('media/banner/header2/bigc.png')}}" alt="astriol pertical"></li>
            <li><img src="{{asset('media/banner/header2/dot.png')}}" alt="astriol pertical"></li>
            <li><img src="{{asset('media/banner/header2/c1.png')}}" alt="astriol pertical"></li>
            <li><img src="{{asset('media/banner/header2/dotsm.png')}}" alt="astriol pertical"></li>
            <li><img src="{{asset('media/banner/header2/c2.png')}}" alt="astriol pertical"></li>
            <li><img src="{{asset('media/banner/header2/hc1.png')}}" alt="astriol pertical"></li>
            <li><img src="{{asset('media/banner/header2/hc2.png')}}" alt="astriol pertical"></li>
        </ul>
        <!-- /.banner-pertical -->

        <div class="page-title-wrapper text-center">
            <h1 class="page-title">{{$module->title}}</h1>
        </div>
        <!-- /.page-title-wrapper -->

    </section>
    <!-- /.page-banner -->

    <!--========================-->
    <!--=         Blog         =-->
    <!--========================-->


@if(count($module->lessons))
    <section class="blog-posts">
        <div class="container">
            <div class="astriol__blogs wow fadeIn" data-wow-delay="0.3s">
                <div class="col-md-12">
                    <div class="row">
                        @foreach($module->lessons as $lesson)
                            <div class="col-md-4">
                                <div class="astriol__blog-post p-3" style="min-height: 350px">
                                    <div class="post-thumbnail">
                                        <a href="{{url('modules/' . $module->slug . '/' . $lesson -> slug)}}">
                                            <img src="{{asset('storage/' . $module -> thumbnail)}}" alt="{{$lesson->title}}" class="img-fluid d-block  mx-auto" style="height: 200px">
                                        </a>
                                    </div>
                                    <!-- /.post-thumbnail -->

                                    <div class="entry-content">
                                        <h2 class="entry-title"><a href="{{url('modules/' . $module->slug . '/' . $lesson -> slug)}}">{{$lesson->title}}</a></h2>
                                        <ul class="post-meta">
                                            <li><a href="#">{{$lesson -> created_at}}</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.blog-content -->
                                </div>
                                <!-- /.astriol__blog-post -->
                            </div>


                        @endforeach




                    </div>
                </div>
            </div>            <!-- /.container -->
    </section>
    <!-- /.portfolios -->
@else
    <div class="alert alert-danger container my-3">
        <h1 class="display-1 text-center">Vide</h1>
    </div>

@endif
@endsection
