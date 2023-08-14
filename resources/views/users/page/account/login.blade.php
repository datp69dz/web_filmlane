@extends('users.layout.app')

@section('content')
<!-- Normal Breadcrumb Begin -->

<!-- Normal Breadcrumb End -->

<section style="height:320px " class="normal-breadcrumb set-bg" data-setbg="users/img/wallpapersden.com_godzilla-4k-8k-banner_8000x2335.jpg"></section>


@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->has('login'))
    <div class="alert alert-danger">
        {{ $errors->first('login') }}
    </div>
@endif
<div style="  background: url(users/img/service-bg.jpg) no-repeat;background-size: cover;background-position: center;padding-block: var(--section-padding); height:466px">


<!-- Login Section Begin -->
<section class="login spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login__form login__form_a">
                    <h3>Login</h3>
                    <form action="{{ route('post_login') }}" method="POST">
                        @csrf
                        <div class="input__item">
                            <input type="text" name="email" placeholder="Email">
                            <span class="icon_mail"></span>
                        </div>
                        <div class="input__item">
                            <input type="password" name="password" placeholder="Password">
                            <span class="icon_lock"></span>
                        </div>
                        <button type="submit" class="site-btn">Login Now</button>
                    </form>
                    <a href="{{ route('password.request') }}" class="forget_pass">Forgot Your Password?</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login__register">
                    <h3>Don't Have An Account?</h3>
                    <a href="{{ route('get_register')}}" class="primary-btn">Register Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Login Section End -->
</div>
@endsection
