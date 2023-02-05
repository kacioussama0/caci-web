@extends('layouts.app')
@section('title','Accueil')


@section('content')

    <!--==========================-->
    <!--=         Banner         =-->
    <!--==========================-->
    <section class="banner banner-comminity">

        <div class="banner-main-content-wrapper">
            <div class="banner-content">
                <h1 class="banner-title text-center wow fadeInUp" data-wow-delay="0.3s">
                    Bienvenue Dans <span class="text-success">CACI WEB</span></span>
                </h1>
                <div class="banner-search-form-wrapper wow fadeInUp" data-wow-delay="0.5s">
                    <p class="text-center">vous trouvez des leçons, des exercices et tout ce qui est nouveau dans le développement Web</p>
                </div>
                <!-- /.banner-button-container -->

                <div class="banner-content-bg text-center wow fadeInDown">
                    <img src="media/banner/banner-comminity.png" alt="banner-comminity">
                </div>
                <!-- /.banner-content-bg -->
            </div>
            <!-- /.banner-content -->

        </div>
        <!-- /.banner-main-content-wrapper -->

    </section>
    <!-- /.banner banner-main -->

    <!--==================================-->
    <!--=         Community Help         =-->
    <!--==================================-->
    <section class="comminity-help">
        <div class="container">
            <div class="section-heading text-center">
                <h3 class="subtitle wow fadeInUp">Caractéristiques</h3>
                <h2 class="section-title wow fadeInUp" data-wow-delay="0.3s">
                    Caractéristiques
                </h2>
            </div>
            <!-- /.section-heading -->

            <div class="row justify-content-center">
                <div class="col-md-4 col-sm-6">
                    <div class="comminity-help-category color-one wow fadeInRight" data-wow-delay="0.5s">
                        <div class="category-icon">
                            <i class="ei ei-paperclip"></i>
                        </div>

                        <div class="category-content">
                            <h3 class="category-title"><a href="#">Semestres</a></h3>
                            <div class="color-one">Chaque Semestre contient des modules</div>
                        </div>
                    </div>
                    <!-- /.comminity-help-category -->
                </div>
                <!-- /.col-md-4 -->

                <div class="col-md-4 col-sm-6">
                    <div class="comminity-help-category color--two wow fadeInRight" data-wow-delay="0.7s">
                        <div class="category-icon">
                            <i class="ei ei-printer"></i>
                        </div>

                        <div class="category-content">
                            <h3 class="category-title"><a href="#">Modules</a></h3>
                            <div class="color-one">Chaque Modules contient des lecons</div>
                        </div>
                    </div>
                    <!-- /.comminity-help-category -->
                </div>
                <!-- /.col-md-4 -->

                <div class="col-md-4 col-sm-6">
                    <div class="comminity-help-category color--three wow fadeInRight" data-wow-delay="0.9s">
                        <div class="category-icon">
                            <i class="ei ei-icon_house_alt"></i>
                        </div>

                        <div class="category-content">
                            <h3 class="category-title"><a href="#">Exercices</a></h3>
                            <div class="color-one">Chaque Modules contient des exercices</div>

                        </div>
                    </div>
                    <!-- /.comminity-help-category -->
                </div>
                <!-- /.col-md-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.comminity-help -->

    <!--==========================-->
    <!--=         CountUp        =-->
    <!--==========================-->

    <div id="countdown-community">
        <div class="container">

            <div class="section-heading text-center">
                <h3 class="subtitle wow fadeInUp">Statistiques</h3>
                <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">
                    Tous Les Statistique<br>
                    De Site
                </h2>
            </div>
            <!-- /.sectiob-heading -->

            <div class="comminity-countup-wrapper">


                <div class="comminity-count-item">
                    <div class="fun-fact color-two wow fadeInUp" data-wow-delay="0.5s">
                        <div class="count-icon-container">
                            <img src="media/funfact/2.png" alt="astriol funfact">
                        </div>
                        <!-- /.icon-box -->
                        <h4 class="count" data-counter="{{count($semesters)}}">{{count($semesters)}}</h4>
                        <p class="count-name">Semestres</p>
                    </div>
                    <!-- /.fun-fact -->
                </div>
                <!-- /.comminity-count-item -->

                <div class="comminity-count-item">
                    <div class="fun-fact color-three wow fadeInUp" data-wow-delay="0.7s">
                        <div class="count-icon-container">
                            <img src="media/funfact/3.png" alt="astriol funfact">
                        </div>
                        <!-- /.icon-box -->
                        <h4 class="count" data-counter="{{count(\App\Models\Module::all())}}">{{count(\App\Models\Module::all())}}</h4>
                        <p class="count-name">Modules</p>
                    </div>
                    <!-- /.fun-fact -->
                </div>
                <!-- /.comminity-count-item -->

                <div class="comminity-count-item">
                    <div class="fun-fact color-four wow fadeInUp" data-wow-delay="0.9s">
                        <div class="count-icon-container">
                            <img src="media/funfact/4.png" alt="astriol funfact">
                        </div>
                        <!-- /.icon-box -->
                        <h4 class="count" data-counter="{{count(\App\Models\Lesson::all())}}">{{count(\App\Models\Lesson::all())}}</h4>
                        <p class="count-name">Lecons</p>
                    </div>
                    <!-- /.fun-fact -->
                </div>
                <!-- /.comminity-count-item -->

                <div class="comminity-count-item">
                    <div class="fun-fact color-five wow fadeInUp" data-wow-delay="0.9s">
                        <div class="count-icon-container">
                            <img src="media/funfact/5.png" alt="astriol funfact">
                        </div>
                        <!-- /.icon-box -->
                        <h4 class="count" data-counter="{{count(\App\Models\Exercice::all())}}">{{count(\App\Models\Exercice::all())}}</h4>
                        <p class="count-name">Exercices</p>
                    </div>
                    <!-- /.fun-fact -->
                </div>
                <!-- /.comminity-count-item -->

            </div>
            <!-- /.creative-countup-wrapper -->
        </div>
        <!-- /.container -->

        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="smile-two" data-parallax='{"y": 50}' width="250px" height="250px">
            <path fill-rule="evenodd" fill="rgb(239, 239, 239)" d="M125.000,249.999 C56.075,249.999 -0.000,193.924 -0.000,124.999 C-0.000,56.074 56.075,-0.001 125.000,-0.001 C193.926,-0.001 250.000,56.074 250.000,124.999 C250.000,193.924 193.925,249.999 125.000,249.999 ZM200.620,43.160 C180.733,24.770 154.158,13.513 125.000,13.513 C63.526,13.513 13.514,63.525 13.514,124.999 C13.514,143.622 18.110,161.189 26.218,176.637 C31.542,186.780 38.379,196.010 46.433,204.019 C66.601,224.073 94.378,236.485 125.000,236.485 C186.473,236.485 236.486,186.473 236.486,124.999 C236.486,107.801 232.570,91.501 225.585,76.940 C219.445,64.144 210.931,52.694 200.620,43.160 ZM124.761,194.254 C121.851,194.254 118.932,194.090 116.009,193.753 C93.238,191.126 72.186,178.018 59.694,158.686 L71.044,151.350 C81.367,167.326 98.755,178.159 117.558,180.328 C141.686,183.111 165.782,171.735 178.955,151.350 L190.306,158.686 C175.960,180.884 150.905,194.254 124.761,194.254 ZM167.794,110.641 C160.331,110.641 154.281,104.591 154.281,97.127 C154.281,89.664 160.331,83.613 167.794,83.613 C175.258,83.613 181.308,89.664 181.308,97.127 C181.308,104.591 175.258,110.641 167.794,110.641 ZM84.178,110.641 C76.715,110.641 70.665,104.591 70.665,97.127 C70.665,89.664 76.715,83.613 84.178,83.613 C91.642,83.613 97.692,89.664 97.692,97.127 C97.692,104.591 91.642,110.641 84.178,110.641 Z" />
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="smile-one" data-parallax='{"y": -70}' width="630px" height="630px">
            <path fill-rule="evenodd" fill="rgb(239, 239, 239)" d="M315.000,629.999 C141.309,629.999 -0.000,488.688 -0.000,314.998 C-0.000,141.307 141.309,-0.002 315.000,-0.002 C488.693,-0.002 630.000,141.307 630.000,314.998 C630.000,488.688 488.690,629.999 315.000,629.999 ZM505.562,108.764 C455.447,62.420 388.479,34.052 315.000,34.052 C160.086,34.052 34.054,160.084 34.054,314.998 C34.054,361.927 45.637,406.198 66.070,445.125 C79.485,470.686 96.715,493.945 117.011,514.129 C167.835,564.664 237.832,595.942 315.000,595.942 C469.913,595.942 595.945,469.911 595.945,314.998 C595.945,271.658 586.076,230.582 568.474,193.891 C553.002,161.642 531.546,132.789 505.562,108.764 ZM314.398,489.520 C307.065,489.520 299.710,489.106 292.343,488.257 C234.961,481.638 181.908,448.604 150.429,399.888 L179.030,381.403 C205.046,421.662 248.864,448.962 296.247,454.426 C357.049,461.442 417.770,432.774 450.967,381.403 L479.570,399.888 C443.419,455.829 380.280,489.520 314.398,489.520 ZM422.842,278.815 C404.034,278.815 388.787,263.569 388.787,244.761 C388.787,225.953 404.034,210.707 422.842,210.707 C441.650,210.707 456.897,225.953 456.897,244.761 C456.897,263.569 441.650,278.815 422.842,278.815 ZM212.129,278.815 C193.322,278.815 178.075,263.569 178.075,244.761 C178.075,225.953 193.322,210.707 212.129,210.707 C230.937,210.707 246.184,225.953 246.184,244.761 C246.184,263.569 230.937,278.815 212.129,278.815 Z" />
        </svg>
    </div>
    <!-- /#countdown -->

    <!--================================-->
    <!--=         Image Content        =-->
    <!--================================-->
    <section class="community-posts-area">
        <div class="container">
            <div class="section-heading text-center">
                <h3 class="subtitle wow fadeInUp">Derniers Lecons</h3>
                <h2 class="section-title wow fadeInUp" data-wow-delay="0.3s">
                    Derniers Lecons Dans Tous Les Modules
                </h2>
            </div>

            <div class="community-posts-wrapper">
                @foreach(\App\Models\Lesson::latest()->get()->take(12) as $lesson)


                    <div class="community-post wow fadeInUp" data-wow-delay="0.5s">
                        <div class="post-content">
                            <div class="author-avatar">
                                <img src="{{asset('storage/' . $lesson->module->thumbnail)}}" class="object-fit-cover img-fluid" alt="community post">
                            </div>

                            <div class="entry-content">
                                <h3 class="post-title">
                                    <a href="{{url('modules/' . $lesson->module->slug . '/' . $lesson->slug)}}" class="stretched-link">{{$lesson->title}}</a>
                                </h3>
                                <p>{{$lesson->created_at}}</p>
                            </div>
                        </div>

                        <div class="post-meta-wrapper">
                            <span class="badge  bg-primary text-light rounded-pills">{{$lesson->module->title}}</span>
                        </div>
                    </div>

                @endforeach

                <!-- /.community-post -->

            </div>
            <!-- /.community-posts-wrapper -->

        </div>
        <!-- /.container -->
    </section>
    <!-- /.community-posts-area -->


    <!--==========================-->
    <!--=         Feature        =-->
    <!--==========================-->
    <section class="feature-comminity-two">
        <div class="container">
            <div class="section-heading">
                <h3 class="subtitle wow fadeInUp">Semestres</h3>
                <h2 class="section-title wow fadeInUp" data-wow-delay="0.3s">
                    Modules Par Semestre
                </h2>
            </div>
            <!-- /.section-heading -->

            <div class="featrure-list-items">
                <div class="row justify-content-center">
                    @foreach($semesters as $semester)

                        @foreach($semester -> modules as $module)

                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="feature-list-item wow fadeInLeft" data-wow-delay="0.4s">
                                    <div class="icon-container">
                                        <img src="{{asset('storage/' . $module -> thumbnail)}}" alt="{{$module -> title}}" width="40">
                                    </div>
                                    <!-- /.icon-container -->

                                    <h4 class="list-title">
                                        <a href="{{url('module/' . $module -> slug)}}">{{$module -> title}}</a>
                                    </h4>
                                </div>
                                <!-- /.feature-list-item -->
                            </div>

                        @endforeach

                    @endforeach

                    <!-- /.com-md-3 -->


                </div>
                <!-- /.row -->
            </div>
            <!-- /.featrure-list-items -->
        </div>
    </section>

@endsection

@section('scripts')

@endsection
