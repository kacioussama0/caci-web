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
        <h1 class="page-title">Outils</h1>
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
                    <div class="col-md-4">
                        <div class="astriol__blog-post p-3" style="min-height: 250px">
                            <div class="post-thumbnail">
                                <img src="https://www.ipxo.com/app/uploads/2022/08/What-is-IPv4-packet-header-820x460.jpg" alt="">
                            </div>
                            <!-- /.post-thumbnail -->

                            <div class="entry-content text-center">

                                <h2 class="entry-title"><a href="{{url('tools/ipv4-calculator')}}" class="stretched-link">IPV4 Calculatrice</a></h2>

                            </div>
                            <!-- /.blog-content -->
                        </div>
                        <!-- /.astriol__blog-post -->
                    </div>






                </div>
            </div>
            <!-- /.container -->
</section>
<!-- /.portfolios -->



@endsection
