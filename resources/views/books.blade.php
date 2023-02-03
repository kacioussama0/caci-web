@extends('layouts.app')
@section('title','Livres')

@section('styles')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link href="{{asset('dflip/css/dflip.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('dflip/js/dflip.min.js')}}"></script>
    <script src="{{asset('dflip/js/metaboxes.min.js')}}"></script>

@endsection

@section('content')

<section class="lesson">



    <div class="container my-5">

        <h1 class="text-center">Livres</h1>

        <div class="row">

            @foreach($books as $book)

                <div class="col-sm-6 col-md-3    text-center" >
                    <div class="_df_thumb" source="{{asset('storage/' . $book -> book)}}"  thumb="{{asset('storage/' . $book -> thumbnail)}}">
                        {{$book->name}}
                    </div>
                </div>


            @endforeach

        </div>
</section>

@endsection
