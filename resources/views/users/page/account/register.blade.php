@extends('users.layout.app')

@section('content')

<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg" data-setbg="users/img/wallpapersden.com_godzilla-4k-8k-banner_8000x2335.jpg"></section>
<!-- Normal Breadcrumb End -->

@if ($errors->any())
            <div style="" class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
        
        <div style="  background: url(users/img/service-bg.jpg) no-repeat;background-size: cover;background-position: center;padding-block: var(--section-padding); height:570px">

<!-- Signup Section Begin -->
<section class="signup spad">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="login__form">
                    <h3>Sign Up</h3>
                    <form action="{{ route('post_register') }}" method="POST">
                        @csrf
                        <div class="input__item">
                            <input type="text" name="email" placeholder="Email address">
                            <span class="icon_mail"></span>
                        </div>
                        <div class="input__item">
                            <input type="text" name="username" placeholder="Your Name">
                            <span class="icon_profile"></span>
                        </div>
                        <div class="input__item">
                            <input type="password" name="password" placeholder="Password">
                            <span class="icon_lock"></span>
                        </div>
                        <button type="submit" class="site-btn">Sign Up Now</button>
                    </form>
                    <h5>Already have an account? <a href="{{route('get_login')}}">Log In!</a></h5>
                </div>
            </div>
        </div>
    </div>
</section>
        </div>
<!-- Signup Section End -->

@endsection
