<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('../users/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../users/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../users/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../users/css/plyr.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../users/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../users/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../users/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../users/css/style.css') }}" type="text/css">

    {{-- <link rel="stylesheet" href="../users/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../users/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../users/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../users/css/plyr.css" type="text/css">
    <link rel="stylesheet" href="../users/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../users/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../users/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../users/css/style.css" type="text/css"> --}}

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Phần đầu trang -->
    @include('../users.includes.header')

    <!-- Nội dung chính -->
    @yield('content')

    <!-- Phần cuối trang -->
    @include('../users.includes.footer')
    <div></div>

  <!-- Search model Begin -->
  <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- Js Plugins -->
{{-- <script src="../users/js/jquery-3.3.1.min.js"></script>
<script src="../users/js/bootstrap.min.js"></script>
<script src="../users/js/player.js"></script>
<script src="../users/js/jquery.nice-select.min.js"></script>
<script src="../users/js/mixitup.min.js"></script>
<script src="../users/js/jquery.slicknav.js"></script>
<script src="../users/js/owl.carousel.min.js"></script>
<script src="../users/js/main.js"></script> --}}

<script src="{{ asset('users/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('users/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('users/js/player.js') }}"></script>
<script src="{{ asset('users/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('users/js/mixitup.min.js') }}"></script>
<script src="{{ asset('users/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('users/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('users/js/main.js') }}"></script>


</body>

</html>