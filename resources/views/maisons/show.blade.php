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
                        <li class="nav-item active"><a class="nav-link" href="{{ route('maisons.index')}}">appartements</a></li>
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

    <section class="breadcrumb_area blog_banner_alo">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">

        </div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle f_48">Les Appartements</h2>
                <ol class="breadcrumb">
                    <li><a href="/home">Home</a></li>
                    <li><a href="{{ route('maisons.index')}}">Les Appartements</a></li>
                </ol>
            </div>
        </div>
    </section> <br><br><br>
    <div class="pull-left">
        <a class="genric-btn warning circle" href="{{ route('maisons.index') }}"> retour </a>
    </div> <br><br>
{{--    <div class="row">--}}
{{--        <div class="col-lg-12 margin-tb">--}}

{{--            <div class="pull-right">--}}
{{--                <a class="btn btn-primary" href="{{ route('maisons.index') }}"> Retour </a>--}}
{{--            </div>--}}
{{--            <div class="pull-left">--}}
{{--                <center><h2> <img src="{{asset('upload/'."".$maison->image)}}" alt="" style="width:400px; height:300px;"> </h2></center>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                <center>--}}
{{--                    <strong></strong> <br/>--}}
{{--                    {{ $maison->content }}--}}
{{--                </center>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                <div class="form-group">--}}
{{--                    <center>--}}
{{--                        <strong>nombre de chambre</strong> <br/>--}}
{{--                        {{ $maison->nombre_de_chambre}}--}}
{{--                    </center>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                <center>--}}
{{--                    <strong>surface</strong> <br/>--}}
{{--                    {{ $maison->surface}}--}}
{{--                </center>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                <center>--}}
{{--                    <strong>prix</strong> <br/>--}}
{{--                    {{ $maison->prix}}--}}
{{--                </center>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                <center>--}}
{{--                    <strong>chauffage</strong> <br/>--}}
{{--                    {{ $maison->chauffage}}--}}
{{--                </center>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                <center>--}}
{{--                    <strong>cimatisation</strong> <br/>--}}
{{--                    {{ $maison->climatisation}}--}}
{{--                </center>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                <div class="form-group">--}}
{{--                    <center>--}}
{{--                        <strong>ville</strong> <br/>--}}
{{--                        {{ $maison->ville_id }}--}}
{{--                    </center>--}}
{{--                </div>--}}
{{--            </div>--}}


<br>
<center>
    <div class="col-lg-8 posts-list">
        <div class="col-md-9">
            <div class="blog_post">

                <div class="blog_details">
                    <img src="{{asset('upload/'."".$maison->image)}}"  alt="">
                </div>
            </div>
        </div>

        <center><a href="#"><h4 class="sec_h4">{{$maison->ville->name}}</h4></a></center>
        <div class="details">

            <div class="tags">
                <center><h6 class="date title_color">{{ $maison->created_at->format('d M Y - H:i:s') }}</h6></center>
                <a href="#" class="button_hover tag_btn">chambres :{{ $maison->nombre_de_chambre }}</a>
                <a href="#" class="button_hover tag_btn">Surface :{{ $maison->surface }} m²</a>
                <a href="#" class="button_hover tag_btn">Prix :{{ $maison->prix }} MAD</a>
                <center>
                    <a href="#" class="button_hover tag_btn">Chauffage :{{ $maison->chauffage }}</a>
                    <a href="#" class="button_hover tag_btn">Climatisation :{{ $maison->climatisation }}</a>
                </center>

                <div class="blog_details">
                    <p>{{ $maison->content }}.</p>
                </div>

            </div>

        <div class="comment-form">
            <h4>Commenter la publication</h4>
            <form action="/maisons/{{$maison->id}}/store" method="POST">
                {{csrf_field()}}
                <div class="form-group form-inline">
                    <div class="form-group col-lg-6 col-md-6 name">
                        <span class="form-label">&#160;Date d'arrivé</span>
                        <input class="form-control" name="checkin"  type="date" required class="form-control" >
                    </div>
                    <div class="form-group col-lg-6 col-md-6 email">
                        <label class="form-label">&#160;date de sortir</label>

                        <input class="form-control" name="checkout"  type="date" required class="form-control" >

                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control mb-10" rows="5" name="body" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                </div>
                <button type="submit" class="primary-btn button_hover">Commenter</button>
            </form>
        </div>
        <div class="comments-area ">
            <h4>Les commentaires</h4>

            @foreach($maison->logements as $logement)
                <div class="section-top-border">
                    <h3 class="text-left text-dark">{{$logement->user->name}}</h3>

                    <div class="row">
                        <div class="col-lg-12">
                            <blockquote class="generic-blockquote">
                                <p class="text-left">{{$logement->user->phone}} </p>
                                <p class="text-left">
                                    {{$logement->body}}
                                    <br/>
                                    Je veux cette maison de {{$logement->checkin}} à {{$logement->checkout}}
                                </p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> <br><br>






@endsection
