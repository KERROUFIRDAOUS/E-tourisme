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

    {{--<section>--}}
{{--    <div class="row">--}}
{{--        <div class="col-lg-12 margin-tb">--}}

{{--            <div class="pull-right">--}}
{{--                <a class="btn btn-primary" href="{{ route('villes.index') }}"> Retour </a>--}}
{{--            </div>--}}
{{--            <div class="pull-left">--}}
{{--                <center><h2> <img src="{{asset('upload/'."".$ville->image)}}" alt="" style="width:400px; height:300px;"> </h2></center>--}}
{{--            </div>--}}
{{--            <div class="pull-left">--}}
{{--                <center><h2> {{ $ville->name }} </h2></center>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row">--}}
{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <div class="form-group">--}}

{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                <center>--}}
{{--                    <strong></strong> <br/>--}}
{{--                    {{ $ville->content }}--}}
{{--                </center>--}}
{{--            </div>--}}
{{--        </div>--}}



{{--    </div>--}}
{{--    <center>--}}
{{--    <li class="active"><a href="{{ route('hotels.index') }} ">hotels</a></li>--}}
{{--    <li class="active"><a href="{{ route('maisons.index') }} ">maisons</a></li>--}}
{{--    </center>--}}
{{--    </section>--}}

<section class="breadcrumb_area blog_banner_two">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle f_48">Details</h2>
            <ol class="breadcrumb">
                <li><a href="/Home">Accueil</a></li>
                <li><a href="{{ route('villes.show',$ville->id) }}">{{ $ville->name }}</a></li>
            </ol>
        </div>
    </div>
</section>

<section class="about_history_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d_flex align-items-center">
                <div class="about_content ">
                    <h2 class="title title_color"> {{ $ville->name }}</h2>
                    <p> {{ $ville->content }}.</p>
                    <a href="{{ route('hotels.index') }} "class="button_hover theme_btn_two">Hotels</a>
                    <a href="{{ route('maisons.index') }} " class="button_hover theme_btn_two">Maisons</a>
                </div>
            </div>
            <div class="col-md-6">
                <img class="img-fluid" src="{{asset('upload/'."".$ville->image)}}" alt="img">
            </div>
        </div>
    </div>
</section>

@endsection
