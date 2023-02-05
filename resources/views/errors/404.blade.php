@extends('layouts.app')
@section('title','404')


@section('content')

    <!--==========================-->
    <!--=         Error         =-->
    <!--==========================-->
    <section class="error-page">
        <div class="container pr">
            <div class="error-page-content-wrapper text-center">
                <div class="error-image">
                    <img src="media/background/404.png" alt="Astriol Error">
                </div>
                <!-- /.error-image -->

                <div class="error-content">
                    <h2 class="error-title">
                        Page N'est Pas Exist<br>
                    </h2>

                    <div class="button-container">
                        <a href="index.html" class="gp-btn">Accueil</a>
                        <a href="contact.html" class="gp-btn btn-grey">Contacter Nous</a>
                    </div>
                </div>
            </div>
            <!-- /.error-page-content-wrapper -->
        </div>
        <!-- /.container -->

        <ul class="animate-element">
            <li><img src="media/banner/main/rabar.png" alt="Astriol Rabar"></li>
            <li><img src="media/banner/main/box_dot.png" alt="Astriol Box"></li>
            <li><img src="media/banner/main/flash.png" alt="Astriol Flash"></li>
            <li><img src="media/banner/main/angle.png" alt="Astriol Angle"></li>
        </ul>
    </section>
    <!-- /.error-page -->

@endsection
