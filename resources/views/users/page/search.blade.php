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
                    <span>{{ $movies->title}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="anime-details spad">
    <div class="container">
        <div class="row">
            
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="product__sidebar">
</div>
</div>
</div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="anime__video__player">
                    <video id="player" playsinline controls data-poster="./videos/anime-watch.jpg">
                        <source src="{{ asset('users/videos') }}/{{$movies -> movie_url}}" type="video/mp4" />
                        <!-- Captions are optional -->
                        <track kind="captions" label="English captions" src="#" srclang="en" default />
                    </video>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="anime__details__review">
                    <div class="section-title">
                        <h5>Reviews</h5>
                    </div>
                    @foreach($comments as $comment)
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="{{ asset('users/img/popular/' . $movies->image_url) }}" alt="Movie Image">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>{{ $comment->accounts->username }}<span>  {{$comment->comment_date}}</span></h6>
                            <p>{{$comment -> content}}</p>
                        </div>
                    </div>
                    @endforeach   
                </div>
                <div class="anime__details__form">
                    <div class="section-title">
                        <h5>Your Comment</h5>
                    </div>
                    <form method="post" action="{{ route('comment')}}">
                        @csrf
                        <input type="hidden" name="movie_id" value="{{ $movies->movie_id }}">
                        <textarea name="content" placeholder="Your Comment" required></textarea>
                        <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                    </form>
                    
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="product__sidebar">
</div>
</div>
        </div>
    </div>
</section>
@endsection