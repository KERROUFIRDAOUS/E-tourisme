@extends('layouts.userside')

@section('content')

    <header class="header_area">

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- Brand and toggle get grouped for better mobile display -->
{{--                <a class="navbar-brand logo_h" href="index.html"><img src="{{asset('assets1/image/Logo.png')}}" alt=""></a>--}}
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
                        <li class="nav-item active"><a class="nav-link" href="/home">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="/aboutus">à propos</a></li>
                        {{--                    <a href="{{ route('villes.index') }} ">Villes</a>--}}
                        <li class="nav-item"><a class="nav-link" href="{{ route('hotels.index')}}">Hotels</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('maisons.index')}}">appartements</a></li>
                        @if (Auth::check())
                        <li class="nav-item"><a class="nav-link" href="{{ route('mesReservation')}}">Mes Reservations</a></li>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="/contacts">Contact</a></li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
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

    <section class="banner_area">
        <div class="booking_table d_flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h6>Loin de la vie monotone</h6>
                    <h2>Détends ton esprit</h2>
                    <p>Si vous regardez des cassettes vierges sur le Web, vous pouvez être très confus au<br> différence de prix. Vous pouvez baisser le regard sur nos articles</p>
                    <a href="#" class="btn theme_btn button_hover">Commencer</a>
                </div>
            </div>
        </div>
    </section>
    @php
        $hotels = \App\Hotel::all();
    @endphp
    <section class="accomodation_area section_gap">
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">Hotels</h2>
            </div>

            <div class="row accomodation_two">
                @foreach ($hotels as $hotel)
                    <div class="col-lg-3 col-sm-6">
                        <div class="accomodation_item text-center">
                            <div class="hotel_img">
                                <a href="{{route ('hotels.show',$hotel->id) }}"><img src="{{asset('upload/'."".$hotel->image)}}" alt="" style="width:400px; height:300px;"></a>
                                <a href="{{route ('hotels.show',$hotel->id) }}" class="btn theme_btn button_hover">Réserver</a>
                            </div>
                            <a href="{{route ('hotels.show',$hotel->id) }}" ><h4 class="sec_h4">Hotel {{ $hotel->name }}</h4></a>
                            @for($i=1;  $i<=$hotel->stars  ; $i++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            <h6 class="sec_h6">{{ $hotel->ville->name }}</h6>
                            <p>{{Str::limit( $hotel->content, 250) }}</p>
                            <h5>{{ $hotel->price }} MAD<small>/nuit </small></h5>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>



@endsection

