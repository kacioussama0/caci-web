@extends('layouts.app')
@section('title','Modules')

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
        <h1 class="page-title">Modules</h1>
    </div>
    <!-- /.page-title-wrapper -->

</section>
<!-- /.page-banner -->

<!--========================-->
<!--=         Blog         =-->
<!--========================-->
<section class="blog-posts">
    <div class="container">
        <div class="astriol__blogs wow fadeIn" data-wow-delay="0.3s">
            <div class="col-md-12">
                <div class="row">
                @foreach($modules as $module)
                    <div class="col-md-4">
                        <div class="astriol__blog-post p-3" style="min-height: 450px">
                            <div class="post-thumbnail">
                                <a href="{{url('module/' . $module->slug)}}">
                                    <img src="{{asset('storage/' . $module -> thumbnail)}}" alt="{{$module->title}}" class="img-fluid d-block  mx-auto" style="height: 200px">
                                </a>
                            </div>
                            <!-- /.post-thumbnail -->

                            <div class="entry-content">
                                <a href="#" class="entry-meta">{{$module->semester->title}}</a>

                                <h2 class="entry-title"><a href="{{url('module/' . $module->slug)}}">{{$module->title}}</a></h2>

                                <div class="blog-footer">
                                    <div class="date-meta">
                                        {{count($module->lessons)}} Lecons
                                    </div>
                                </div>
                            </div>
                            <!-- /.blog-content -->
                        </div>
                        <!-- /.astriol__blog-post -->
                    </div>


                @endforeach




                </div>
            </div>
            <!-- /.container -->
</section>
<!-- /.portfolios -->



@endsection
