@extends('layouts.userside')
@section('content')
    <head>
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
                <h2 class="page-cover-tittle f_48">- Hotels -</h2>

            </div>
        </div>
    </section>
    <section class="accomodation_area section_gap">
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">Hotels</h2>
                <p>“A l’hôtel de la décision les gens dorment bien.”</p>
            </div>

            <div class="row accomodation_two">@foreach ($hotels as $hotel)
                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="{{asset('upload/'."".$hotel->image)}}" alt="" style="width:400px; height:300px;">
                            <a href="{{route ('hotels.show',$hotel->id) }}" class="btn theme_btn button_hover">Réserver</a>
                        </div>
                        <a href="{{route ('hotels.show',$hotel->id) }}"><h4 class="sec_h4">{{ $hotel->name }}</h4></a>
                        @for($i=1;  $i<=$hotel->stars  ; $i++)
                            <i class="fa fa-star checked"></i>
                        @endfor
                        <p>{{Str::limit( $hotel->content, 200) }}</p>
                        <h5>${{ $hotel->price }}<small>/night</small></h5>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection
