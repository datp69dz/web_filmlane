<!-- resources/views/movies/index.blade.php -->
@extends('users.layout.app')
@section('content')
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="product__item__pic set-bg"
                            data-setbg="{{ asset('users/img/popular/' . $movie->image_url) }}" alt="{{ $movie->title }}">
                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{ $movie->title }}</h3>
                                <span>{{ $movie->director }}</span>
                            </div>
                            <p>{{ $movie->description }}</p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Nation:</span> {{ $movie->nation }}</li>
                                            <li><span>release_date:</span>{{ $movie->release_date }}</li>
                                            <li><span>Date aired:</span>{{ $movie->year_manufacture }}</li>
                                            <li><span>Status:</span>{{ $movie->status }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Main actor:</span>{{ $movie->main_actor }}</li>
                                            <li><span>director:</span>{{ $movie->director }}</li>
                                            <li><span>Quality:</span>{{ $movie->quality }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                <a href="{{ route('movies.watch', ['id' => $movie->movie_id]) }}"
                                    class="watch-btn"><span>Watch Now</span></a>
                                <a href="{{ route('trailler.watch', ['id' => $movie->movie_id]) }}"
                                    class="watch-btn"><span>Trailer</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="padding-top:50px" class="row">
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
        </div>
    </section>
@endsection
