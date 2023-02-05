@extends('layouts.app')
@section('title',"Connexion")
@section('content')


    <!--==========================-->
    <!--=         Banner         =-->
    <!--==========================-->
    <section class="page-banner-three">
        <div class="container pr">

            <div class="page-title-wrapper text-left">
                <h1 class="page-title">My Account</h1>

                <ul class="breadcrumbs">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>Sign In</li>
                </ul>
            </div>
            <!-- /.page-title-wrapper -->
        </div>
        <!-- /.container -->

        <ul class="banner-pertical-three parallax-element">
            <li>
                <img src="media/banner/main/tryangle_dot.png" class="layer" data-depth="0.01" alt="astriol pertical">
            </li>
            <li>
                <img src="media/banner/main/box_dot.png" class="layer" data-depth="0.03" alt="astriol pertical">
            </li>

            <li>
                <img src="media/banner/main/rabar.png" class="layer" data-depth="0.02" alt="astriol pertical">
            </li>

            <li>
                <img src="media/banner/main/box_dot2.png" class="layer" data-depth="0.02" alt="astriol pertical">
            </li>

            <li>
                <img src="media/banner/main/flash.png" class="layer" data-depth="0.01" alt="astriol pertical">
            </li>
        </ul>
        <!-- /.banner-pertical -->

        <div class="bottom-shape">
            <img src="media/background/bottom_shape.png" alt="bottom">
        </div>
    </section>
    <!-- /.page-banner -->

    <!--==========================-->
    <!--=         Signin         =-->
    <!--==========================-->
    <section class="signin-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                                    <form action="{{route('login')}}" class="account-form" method="POST">
                                        @csrf
                                        <div class="gp-input-group">
                                            <label for="email">{{ __('Email Address') }}</label>
                                            <input type="email" class="gp-input" name="email" id="email" placeholder="Address Email" required  value="{{old('email')}}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="gp-input-group mb-25">
                                            <label for="login_password">Mot De Passe</label>
                                            <input type="password" class="gp-input" name="password" id="login_password" placeholder="*****" required value="{{old('password')}}">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <button type="submit" class="gp-btn submit-btn">
                                            Connexion <i class="ei ei-arrow_right"></i>
                                        </button>
                                    </form>
                        </div><!-- /.tab-content-inner -->
                    </div>
                </div>
                <!-- /.col-md-8 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.signin-page -->

@endsection
