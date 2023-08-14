<link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
<!-- Custom styles for this template -->
<link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">  
<script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>

@extends('users.layout.app')

@section('content')


<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$vnp_TmnCode = "9V8AHBUI"; //Website ID in VNPAY System
$vnp_HashSecret = "TWGINPSOYKRXCHSFNVJWIMKIIORPVFNZ"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
?>      

<!-- Normal Breadcrumb Begin -->
<section style="height:320px " class="normal-breadcrumb set-bg" data-setbg="users/img/wallpapersden.com_godzilla-4k-8k-banner_8000x2335.jpg"></section>
<!-- Normal Breadcrumb End -->
@if(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif
<div class="">
<form id="myForm" action="{{route('postpay')}}" id="create_form" method="post">
    @csrf
    <input type="hidden" name="amount" id="amountInput" value="50">
      

<!-- Hiển thị các thành phần khác của trang -->

<div style=" margin-top: 60px ; margin-bottom: 110px;"class="container">
    <div  class="card__container grid">
        <!--==================== CARD 1 ====================-->
        <article style="background-color: #090b0c7a" class="card__content grid">
            <div class="card__pricing">
                <div class="card__pricing-number">
                    <span class="card__pricing-symbol">$</span>0
                </div>
                <span class="card__pricing-month">/month</span>
            </div>

            <header class="card__header">
                <div class="card__header-circle grid">
                    <img src="assets/img/free-coin.png" alt="" class="card__header-img">
                </div>
                
                <span class="card__header-subtitle">Free plan</span>
                <h1 class="card__header-title">Basic</h1>
            </header>
            
            <ul  class="card__list grid">
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p  class="card__list-description">3 user request</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">10 downloads por day</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Daily content updates</p>
                </li>
            </ul>

            <button id="myButton" type="button" onclick="setAmount(500000)" class="card__button">Choose this plan</button>
        </article>

        <!--==================== CARD 2 ====================-->
        <article style="background-color: #090b0c7a" class="card__content grid">
            <div class="card__pricing">
                <div class="card__pricing-number">
                    <span class="card__pricing-symbol">$</span>19
                </div>
                <span class="card__pricing-month">/month</span>
            </div>

            <header class="card__header">
                <div class="card__header-circle grid">
                    <img src="https://www.citypng.com/public/uploads/preview/hd-premium-quality-guaranteed-label-logo-sign-png-11662549202g1cby2r0nr.png" alt="" class="card__header-img">
                </div>

                <span class="card__header-subtitle">Most popular</span>
                <h1 class="card__header-title">Professional</h1>
            </header>
            
            <ul class="card__list grid">
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">100000000 user request</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Unlimited downloads</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Unlock all features from our site</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Daily content updates</p>
                </li>
            </ul>

            <button type="button" onclick="setAmount(100000)" class="card__button">Choose this plan</button>
        </article>

        <!--==================== CARD 3 ====================-->
        <article style="background-color: #090b0c7a" class="card__content grid">
            <div class="card__pricing">
                <div class="card__pricing-number">
                    <span class="card__pricing-symbol">$</span>29
                </div>
                <span class="card__pricing-month">/month</span>
            </div>

            <header class="card__header">
                <div class="card__header-circle grid">
                    <img src="assets/img/enterprise-coin.png" alt="" class="card__header-img">
                </div>

                <span class="card__header-subtitle">For agencies</span>
                <h1 class="card__header-title">Enterprise</h1>
            </header>
            
            <ul class="card__list grid">
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Unlimited  user request</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Unlimited downloads</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Unlock all features from our site</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Daily content updates</p>
                </li>
            </ul>

            <button type="button" onclick="setAmount(200000)" class="card__button">Choose this plan</button>
        </article>
    </div>
    <button  type="submit" onclick="submitForm()" name="redirect" id="redirect" class="btn btn-default btn-submit-pay">Go to the payment page</button>
</div>
</form>


<style>
    .btn-submit-pay{
        float: right;
        background-color:rgb(237, 136, 13);
        color:aliceblue;
        margin:25px 0;
        margin-bottom:25px
    }
    .card__button{
        font-size:16px; font-weight:500000000;     font-family: "Mulish", sans-serif;
    }
    #myButton {
  border: none;
  cursor: pointer;
}

#myButton.selected {
  background-color: #4CAF50;
  color: white;
}

#myButton.selected::after {
  content: "\2713"; /* Dấu tích Unicode */
  margin-left: 5px;
}
</style>
    <script>
        // Lắng nghe sự kiện nhấp chuột vào nút
document.getElementById("myButton").addEventListener("click", function() {
    // Thêm hoặc xóa lớp CSS 'selected'
    this.classList.toggle("selected");
  });

        function setAmount(value) {
          document.getElementById("amountInput").value = value;
        }
        function submitForm() {
            document.getElementById("myForm").submit();
          }
      </script>

</section>
<!-- Signup Section End -->

@endsection


