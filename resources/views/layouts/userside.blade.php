<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="image/favicon.png" type="image/png">
    <title>DreamiNorth</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets1/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets1/vendors/linericon/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets1/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets1/vendors/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets1/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets1/vendors/nice-select/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets1/vendors/owl-carousel/owl.carousel.min.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('assets1/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets1/css/responsive.css')}}">
</head>
<body>
<!--================Header Area =================-->
<header class="header_area">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="index.html"><img src="{{asset('assets1/image/logo-4.png')}}" alt="" ></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">
                    <li class="nav-item "><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">About us</a></li>
                    <li class="nav-item"><a class="nav-link" href="accomodation.html">Accomodation</a></li>
                    <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
                    <li class="nav-item submenu dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="blog.html"></a></li>
                            <li class="nav-item"><a class="nav-link" href="blog-single.html"></a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="elements.html"></a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html"></a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<div>
    @yield('content')
</div>

<footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6 class="footer_title">à propos de notre agence </h6>
                    <p> DreamiNorth est une agence à Tétouan qui permet à faciliter aux touristes de trouver des hotels, des locations facilement </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6 class="footer_title">Navigation </h6>
                    <div class="row">
                        <div class="col-4">
                            <ul class="list_style">
                                <li><a href="/home">Accueil</a></li>
                                <li><a href="/aboutus">à propos de nous</a></li>
                                <li><a href="/contacts">Contacter nous</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget instafeed">
                    <h6 class="footer_title">Photos</h6>
                    <ul class="list_style instafeed d-flex flex-wrap">
                        <li><img src="{{asset('')}}assets1/image/instagram/Image-01.jpg" alt=""></li>
                        <li><img src="{{asset('')}}assets1/image/instagram/Image-02.jpg" alt=""></li>
                        <li><img src="{{asset('')}}assets1/image/instagram/Image-03.jpg" alt=""></li>
                        <li><img src="{{asset('')}}assets1/image/instagram/Image-04.jpg" alt=""></li>
                        <li><img src="{{asset('')}}assets1/image/instagram/Image-05.jpg" alt=""></li>
                        <li><img src="{{asset('')}}assets1/image/instagram/Image-06.jpg" alt=""></li>
                        <li><img src="{{asset('')}}assets1/image/instagram/Image-07.jpg" alt=""></li>
                        <li><img src="{{asset('assets1/image/instagram/Image-08.jpg')}}" alt=""></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="border_line"></div>
        <div class="row footer-bottom d-flex justify-content-between align-items-center">
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('assets1/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets1/js/popper.js')}}"></script>
<script src="{{asset('assets1/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets1/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets1/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('assets1/js/mail-script.js')}}"></script>
<script src="{{asset('assets1/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('assets1/vendors/nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{asset('assets1/js/mail-script.js')}}"></script>
<script src="{{asset('assets1/js/stellar.js')}}"></script>
<script src="{{asset('assets1/vendors/lightbox/simpleLightbox.min.js')}}"></script>
<script src="{{asset('assets1/js/custom.js')}}"></script>
</body>
</html>
