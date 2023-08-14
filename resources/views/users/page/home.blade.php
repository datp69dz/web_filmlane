<!-- resources/views/movies/index.blade.php -->
@extends('users.layout.app')
@section('content')
    <script src="{{ asset('users/js/scripts.js') }}"></script>
    @if (isset($message))
        <div class="alert">
            <p>{{ $message }}</p>
        </div>
    @endif

    <!-- Nội dung trang web -->

    <!-- Product Section Begin -->
    <section style="padding-bottom:0;background-color:#101519"class="product spad">
        <div class="container">

            <section style="padding-bottom:0"class="product spad">
                <div style="padding:0 ; margin-bottom:30px" class="container">
                    <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear">
                        <div class="container">
                            <a class="navbar-brand" href="index.html" style="text-transform: uppercase;"> Movies
                                Category</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarResponsive">

                                @if (isset($categories) && count($categories) > 0)
                                    <ul class="navbar-nav ml-auto">
                                        @foreach ($categories as $category)
                                        <li class="nav-item active">
                                            <a href="#" class="nav-link" id="categorySelect"
                                                onclick="getMoviesByCategory('{{ $category->category_id }}')">
                                                {{ $category->category_name }}
                                            </a>
                                            <span class="sr-only">(current)</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>Không có danh mục nào.</p>
                                @endif

                            </div>
                        </div>
                    </nav>
                </div>

                <style>
                    /* Add the hover effect to the movie images */
                    .movie-image:hover {
                        opacity: 0.7; /* You can adjust the opacity as needed */
                    }
                </style>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending__product">


                            <div class="row" id="moviesContainer1">
                                <!-- Nội dung row1 -->
                            </div>

                            <div class="row" id="moviesContainer2">
                                @foreach ($movie as $movie)
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="product__item">
                                            <div class="product__item__pic set-bg">
                                                <img class="movie-image set-bg" style="height: 100%; border-radius: 10px"
                                                    src="storage/uploads/movies/{{ $movie->image_url }}">
                                                @if ($movie->status == 1) 
                                                    <!-- Show free view content here -->
                                                    <div class="ep bg-success" style="font-weight: 600; border-radius: 0; left: 0">FREE</div>
                                                @elseif ($movie->status == 2)
                                                    <!-- Show VIP view content here -->
                                                    <div class="ep bg-warning" style="font-weight: 600; border-radius: 0; left: 0">VIP</div>
                                                @else
                                                @endif
                                                <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                                <div class="view"><i class="fa fa-eye"></i>{{ $movie->view }}</div>
                                            </div>
                                            <div class="product__item__text">
                                                <ul>
                                                    <li>{{ $movie->category->category_name }}</li>
                                                    <li style="margin-left:150px">{{ $movie->quality }}</li>
                                                </ul>
                                                    <a style="color:#fff ; font-weight:600px" href="{{ route('movies.show', ['id' => $movie->movie_id]) }}">{{ $movie->title }}</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            @if ($lastPage > 1)
                            <div style="width: 130px; height: 34px; text-align:right; background-color:#e50914">
                                <ul style="padding-top:5px" class="pagination">
                                    <li style="padding: 0 7px ; color:#fff">Page</li>
                                    @if ($currentPage > 1)
                                        <li  style="padding:0 4px ;color:#fff"><a style="color:#fff" href="{{ route('home', ['page' => $currentPage - 1]) }}"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                    @endif
                            
                                    @for ($i = 1; $i <= $lastPage; $i++)
                                        <li style="padding:0 4px ;color:#fff" class="{{ $i == $currentPage ? 'active' : '' }}"><a style="color:#fff" href="{{ route('home', ['page' => $i]) }}">{{ $i }}</a></li>
                                    @endfor
                            
                                    @if ($currentPage < $lastPage)
                                        <li  style="padding:0 4px ;color:#fff"><a style="color:#fff" href="{{ route('home', ['page' => $currentPage + 1]) }}"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                    @endif
                                </ul>
                        </div>
                        @endif

                        </div>
                    </div>
                </div>

        </div>
        </div>
        <!-- Product Section End -->
        <section
            style="  background: url(users/img/service-bg.jpg) no-repeat;background-size: cover;background-position: center;padding-block: var(--section-padding);"
            class="service">
            <div class="container ss">
                <div class="row">
                    <div class="service-banner col-lg-6 col-md-6 col-sm-12">
                        <figure>
                            <img src="users/img/service-banner.jpg" alt="HD 4k resolution! only $3.99">
                        </figure>
                    </div>
                    <div style="padding-left: 30px;" class="service-content col-lg-6 col-md-6 col-sm-12">

                        <p class="service-subtitle">Our Services</p>


                        <h2 class="h2 service-h2 service-title"> <a style="color:#fff"
                                href="{{ route('pay.index') }}">Upgrade your premium account to enjoy more benefits</a>
                        </h2>

                        <p class="service-text">
                            Welcome to our premium account! Unlock a world of unlimited movie content and experience the
                            highest quality films like never before. Enjoy limitless streaming and indulge in the finest
                            cinematic entertainment available.
                        </p>

                        <ul class="service-list">

                            <li>
                                <div class="service-card">

                                    <div class="card-icon">
                                        <i class="fa fa-hdd-o" aria-hidden="true"></i>
                                    </div>

                                    <div class="card-content">
                                        <h3 class="h3 service-h3 card-title">Enjoy on Your TV.</h3>

                                        <p class="card-text">
                                            Lorem ipsum dolor sit amet, consecetur adipiscing elit, sed do eiusmod tempor.
                                        </p>
                                    </div>

                                </div>
                            </li>

                            <li>
                                <div class="service-card">

                                    <div class="card-icon">
                                        <i class="fa fa-television" aria-hidden="true"></i>
                                    </div>

                                    <div class="card-content">
                                        <h3 class="h3 service-h3 card-title">Watch Everywhere.</h3>

                                        <p class="card-text">
                                            Lorem ipsum dolor sit amet, consecetur adipiscing elit, sed do eiusmod tempor.
                                        </p>
                                    </div>

                                </div>
                            </li>

                        </ul>

                    </div>
                </div>

            </div>
        </section>
    @endsection
