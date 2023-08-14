@extends('users.layout.app')

@section('content')
<div style="background: url(https://codewithsadee.github.io/filmlane/assets/images/footer-bg.jpg); background-size: 95%; background-position: center; padding-block: var(--section-padding); height: 630px">
    <style>
        .verification-body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .verification-container {
            text-align: center;
            padding: 160px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .verification-title {
            margin-top: 0;
            font-size: 40px;
        }

        .verification-text {
            margin: 10px 0;
        }

        .verification-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: rgb(255, 255, 255);
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>

    <div style="padding: 0px 0; box-shadow: none" class="verification-container">
        <img style="width: 150px; height: 150px; margin-bottom: 20px ; " src="https://img.freepik.com/free-icon/email_318-304876.jpg?w=360" alt="">
        <div style="padding: 20px; background-color: #33333377;">
            <h1 style="color: rgb(255, 255, 255); padding-bottom: 10px; padding-top: 20px; font-weight: 500; font-size: 50px" class="verification-title">Email Verification</h1>
            <p style="color: rgb(255, 255, 255);" class="verification-text">An email has been sent to your registered email address. Please check your inbox and</p>
            <p style="color: rgb(255, 255, 255); padding-bottom: 20px" class="verification-text ">follow the instructions to complete the verification process. Once your email is verified, you can proceed.</p>
        </div>
        <a href="{{route('home')}}" style="color: rgb(255, 255, 255); margin:20px 0" class="verification-button" href="">Go Back</a>
    </div>
</div>
@endsection
