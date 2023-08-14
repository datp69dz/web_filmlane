@extends('users.layout.app')
@section('content')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    <a href="./categories.html">Categories</a>
                    <a href="#">Romance</a>
                    <span>{{ $movie->title}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="anime-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="anime__video__player">
                    <video id="player" playsinline controls data-poster="./videos/anime-watch.jpg">
                        <source src="{{ asset('users/videos') }}/{{$movie -> trailer_url}}" type="video/mp4" />
                        <!-- Captions are optional -->
                        <track kind="captions" label="English captions" src="#" srclang="en" default />
                    </video>
                    <h2 style="padding-top:30px; color:#fff; font-size:25px">{{ $movie->title }}</h2>
\
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="product__sidebar">

</div>
</div>
</div>
        </div>

    </div>
</section>
@endsection