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
                        <span>{{ $movie->title }}</span>
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
                            <source src="{{ asset('users/videos') }}/{{ $movie->movie_url }}" type="video/mp4" />
                            <!-- Captions are optional -->
                            <track kind="captions" label="English captions" src="#" srclang="en" default />
                        </video>
                        <h2 style="padding-top:30px; color:#fff; font-size:25px">{{ $movie->title }}</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>
                        @foreach ($comments as $comment)
                            <div class="anime__review__item">
                                <div class="anime__review__item__pic">
                                    <div class="anime__review__item__pic">
                                        @if ($comment->account->image)
                                            <img src="{{ asset('storage/uploads/users/' . $comment->account->image) }}" alt="User Image">
                                        @else
                                            <img src="{{ asset('https://st.depositphotos.com/2218212/2938/i/600/depositphotos_29387653-stock-photo-facebook-profile.jpg') }}" alt="Default Image">
                                        @endif
                                    </div>
                                </div>
                                <div class="anime__review__item__text">
                                    <h6>{{ $comment->account->username }}<span> {{ $comment->comments_date }} </span></h6>
                                    <p>{{ $comment->content }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form method="post" action="{{ route('comment') }}">
                            @csrf
                            <input type="hidden" name="movie_id" value="{{ $movie->movie_id }}">
                            <textarea name="content" placeholder="Your Comment" required></textarea>
                            <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                        </form>

                    </div>
                </div>


                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__comment">
                            <div class="section-title">
                                <h5>SIMILAR MOVIES</h5>
                            </div>
                
                            @foreach ($similarMovies as $similarMovie)
                                <div class="product__sidebar__comment__item">
                                    <div class="product__sidebar__comment__item__pic">
                                        <img style="width:100px" src="../storage/uploads/movies/{{ $similarMovie->image_url }}" alt="">
                                    </div>
                                    <div class="product__sidebar__comment__item__text">
                                        <ul>
                                            <li>{{ $movie->category->category_name }}</li>
                                        </ul>
                                        
                                        <h5><a style="color:#fff ; font-weight:600px" href="{{ route('movies.show', ['id' => $similarMovie->movie_id]) }}">{{ $similarMovie->title }}</a></h5>
                                        <span><i class="fa fa-eye"></i> {{ $similarMovie->view }} Views</span>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
@endsection
