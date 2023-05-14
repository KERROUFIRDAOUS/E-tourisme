@extends('layouts.userside')
@section('content')

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
                        <li class="nav-item"><a class="nav-link" href="{{ route('hotels.index')}}">Hotels</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('maisons.index')}}">appartements</a></li>
                        @if (Auth::check())
                            <li class="nav-item"><a class="nav-link" href="{{ route('mesReservation')}}">Mes Reservations</a></li>
                        @endif
                        <li class="nav-item active"><a class="nav-link" href="/contacts">Contact</a></li>
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
    <section class="breadcrumb_area">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle">Contactez nous</h2>
                <ol class="breadcrumb">
                    <li><a href="/home">Home</a></li>
                    <li class="active">Contactez nous</li>
                </ol>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->

    <!--================Contact Area =================-->
    <br><br>
{{--    <center><h2 class="mb-30 title_color">Contact</h2></center>--}}
    <center><img src="upload/map.jpg"></center>
    <section class="contact_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Martil , Maroc</h6>
                            <p>Avenue Martil Rue 5</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="#">+2126 23 40 23 39</a></h6>
                            <p>Applez nous !<p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="#">Firdaouskb@gmail.com</a></h6>
                            <p>Vous pouvez nous envoyez des messages!!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <form class="row contact_form" action="{{ route('contacts.store') }}" method="POST" id="contactForm" novalidate="novalidate">
                        @csrf
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="title" placeholder="Sujet de votre message">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Votre message..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn theme_btn button_hover">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>




@endsection
