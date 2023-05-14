@extends('layouts.userside')
@section('content')
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Booking Form HTML Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<header class="header_area">

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="left-align-p">
                <a class="navbar logo_h" href="/home"><img src="{{asset('assets1/image/logo-4.png')}}" alt="Accueil" width="280"></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">
                    <li class="nav-item "><a class="nav-link" href="/home">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="/aboutus">à propos</a></li>
                    {{--                    <a href="{{ route('villes.index') }} ">Villes</a>--}}
                    <li class="nav-item active"><a class="nav-link" href="{{ route('hotels.index')}}">Hotels</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('maisons.index')}}">appartements</a></li>
                    @if (Auth::check())
                        <li class="nav-item"><a class="nav-link" href="{{ route('mesReservation')}}">Mes Reservations</a></li>
                    @endif
                    <li class="nav-item"><a class="nav-link" href="/contacts">Contact</a></li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>
</header>

<section class="breadcrumb_area blog_banner_lol">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle f_48">- Réserver pour {{ $hotel->name }} -</h2>

        </div>
    </div>
</section>
<br><br>


<body>
<center>
    <div align="center" class="col-md-7 col-md-push-5" >
        @include('flash-message')
    </div>
</center>

<div class="pull-left">
    <a class="btn btn-primary" href="{{ route('hotels.index') }}"> Retour </a>
</div><br><br><br>
<div id="booking" class="section">
    <div class="section-center">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-md-push-5">
                    <div class="booking-cta">
                        <h1>Faites Votre Réservation</h1>
                        <h3></h3>
                        <h5>{{ $hotel->price }}MAD<small>/jour</small></h5>

                        <p>
                            Les conditions d'annulation  varie en fonction du type d'hébergement. Veuillez nous contactez dans ce cas. <br/>

                            Conditions relatives aux enfants : <br/>

                            Tous les enfants sont les bienvenus.<br/>

                            Les enfants âgés de 6 ans et plus sont considérés comme des adultes dans cet établissement.



                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-md-pull-7">
                    <div class="booking-form">
                        <form action="/save-reservation"  method="POST" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            <div class="form-group">

                                <center><h2>  </h2></center>
                            </div>
                            <input name="hotel_id" hidden value="{{ $hotel->id }}">
                            <input name="price" hidden value="{{ $hotel->price }}">
                            <input name="price" hidden value="{{ $hotel->price }}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <span class="form-label">Nom et prénom</span>
                                        <input class="form-control" disabled  name="user_id" value="{{ Auth::user()->name }}" type="text" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <span class="form-label">Numéro de téléphone</span>
                                        <input class="form-control" disabled  name="phone_id" value="{{ Auth::user()->phone}}" type="text" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <span class="form-label">Chambre</span>
                                        <input type="number"  class="form-control" name="rooms" min="1" max="5" placeholder="1"  required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <span class="form-label">Adults</span>
                                        <input type="number"  class="form-control" name="adults" min="1" max="5" placeholder="2" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <span class="form-label">Enfants</span>
                                        <input type="number"  class="form-control" name="children" min="0" max="5" placeholder="0"  required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">Check In</span>
                                        <input class="form-control" name="checkin" type="date" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">Check out</span>
                                        <input class="form-control" name="checkout" type="date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-btn">
                                <button class="btn theme_btn button_hover" >Reserve</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <br><br><br>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>

@endsection
