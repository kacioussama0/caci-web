@extends('layouts.app')
@section('title',$lesson->title)
@section('content')

    <!--==========================-->
    <!--=         Banner         =-->
    <!--==========================-->
    <section class="page-banner banner-single-post" data-bg-image="{{asset('storage/' . $lesson->module->thumbnail)}}">
        <div class="container banner-pr">
            <div class="page-title-wrapper">
                <a href="#" class="single-meta-cat">{{$lesson -> module -> title}}</a>
                <h1 class="page-title">
                    {{$lesson -> title}}
                </h1>

                <ul class="post-meta">
                    <li><i class="ei ei-icon_clock_alt"></i> <a href="#">{{$lesson -> created_at}}</a></li>
                </ul>
            </div>
            <!-- /.page-title-wrapper -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.page-banner -->

    <!--========================-->
    <!--=         Blog         =-->
    <!--========================-->
    <div class="blog-list-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="astriol__blog-single">
                        {!! $lesson -> content !!}
                    </div>



                </div>
                <!-- /.col-md-8 -->

                <div class="col-md-4 sidebar-container sidebar-widget-area">
                    <aside class="sidebar">
                        <div id="search-2" class="widget astriol_widget widget_search">
                            <form role="search" method="get" class="search-form" action="#">
                                <label>
                                    <input type="search" class="search-field" placeholder="Search..." name="s" title="Search for:">
                                </label>
                                <button type="submit" class="search-submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <div id="gp-posts-widget-2" class="widget gp-posts-widget">
                            <h2 class="widget-title">Autres Lecons</h2>
                            <div class="gp-posts-widget-wrapper">
                                @foreach($lesson -> module -> lessons as $lesson)


                                <div class="post-item">
                                    <div class="post-widget-thumbnail">
                                        <a href="#">
                                            <img src="{{asset('storage/' . $lesson -> module -> thumbnail)}}" alt="thumb">
                                        </a>
                                    </div>
                                    <div class="post-widget-info">
                                        <h5 class="post-widget-title">

                                            <a href="#" title="{{$lesson -> title}}">{{$lesson -> title}}</a>
                                        </h5>
                                        <ul class="post-meta">
                                            <li><a href="#">{{$lesson -> created_at}}</a></li>
                                        </ul>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                        </div>
                    </aside>
                    <!-- /.sidebar -->
                </div>
                <!-- /.col-md-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.blog-list-page -->




@endsection
