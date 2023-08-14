
<!-- resources/views/movies/index.blade.php -->
@extends('users.layout.app')
@section('content')

@if(isset($message))
    <div class="alert">
        <p>{{ $message }}</p>
    </div>
@endif

<!-- Nội dung trang web -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Trending Now</h4>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <section class="product spad">
                            <div class="container">
                                <div class="row">
                                    @foreach ($movies as $movie)
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="product__item">
                                            <div class="product__item__pic">
                                                <img src="{{ asset('users/img/popular/' . $movie->image_url) }}" alt="Movie Image">
                                                <div class="ep">{{ $movie->quality }}</div>
                                                <div class="comment"><i class="fa fa-comments"></i>{{ $movie->quality }}</div>
                                                <div class="view"><i class="fa fa-eye"></i>{{ $movie->view }}</div>
                                            </div>
                                            <div class="product__item__text">
                                                <ul>
                                                    <li>{{ $movie->category->category_name }}</li>
                                                    <li>Movie</li>
                                                </ul>
                                                <h5><a href="{{ route('movies.show', ['id' => $movie->movie_id]) }}">Detail</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    @endsection
