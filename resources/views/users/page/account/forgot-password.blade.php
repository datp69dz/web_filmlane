@extends('users.layout.app')
@section('content')

    <div
        style="  background: url(users/img/service-bg.jpg) no-repeat;background-size: cover;background-position: center;padding-block: var(--section-padding); height:470px ; padding:0 ;">
        @if ($errors->any())
            <div class="alert alert-danger">
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

        <!-- Signup Section Begin -->
        <section style=" padding-top:160px" class="signup spad">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="login__form">
                            <h3 style="font-size:20px">Forgot Password</h3>
                            <form action="{{ route('password.request') }}" method="POST">
                                @csrf
                                <div class="input__item">
                                    <input placeholder="Enter your email" id="email" type="email"
                                        class=" @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <span class="icon_mail"></span>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <button type="submit" class="site-btn">Submit Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Signup Section End -->
@endsection
