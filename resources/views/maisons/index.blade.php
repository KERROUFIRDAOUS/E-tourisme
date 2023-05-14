@extends('layouts.userside')
@section('content')
    {{--    <div class="row">--}}
{{--        <div class="col-lg-12 margin-tb">--}}
{{--            <div class="pull-left">--}}
{{--                <h2>Hotels</h2>--}}
{{--            </div>--}}

{{--            <div class="pull-right">--}}
{{--                <a class="btn btn-primary" href="{{ route('maisons.index') }}"> Retour </a>--}}
{{--            </div>--}}
{{--            <div class="pull-right">--}}
{{--                <a class="btn btn-success" href="{{ route('maisons.create') }}">Ajouter une maison</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    @if ($message = Session::get('success'))--}}
{{--        <div class="alert alert-success">--}}
{{--            <p>{{ $message }}</p>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <table class="table table-bordered">--}}
{{--        <tr>--}}
{{--            <th>Image</th>--}}
{{--            <th>Ville</th>--}}
{{--            <th>Nombre de chambre</th>--}}
{{--            <th>Surface</th>--}}
{{--            <th>Prix</th>--}}
{{--            <th>Chauffage</th>--}}
{{--            <th>Climatisation</th>--}}
{{--            <th>Content</th>--}}
{{--            <th width="280px">Action</th>--}}
{{--        </tr>--}}
{{--        @foreach ($maisons as $maison)--}}
{{--            <tr>--}}
{{--                <td>--}}
{{--                    <img src="{{asset('upload/'."".$maison->image)}}" alt="" style="width:400px; height:300px;">--}}
{{--                </td>--}}
{{--                <td>{{ $maison->ville_id }}</td>--}}
{{--                <td>{{ $maison->nombre_de_chambre }}</td>--}}
{{--                <td>{{ $maison->surface }}</td>--}}
{{--                <td>{{ $maison->prix }}</td>--}}
{{--                <td>{{ $maison->chauffage }}</td>--}}
{{--                <td>{{ $maison->climatisation }}</td>--}}
{{--                <td>{{ $maison->content }}</td>--}}
{{--                <td>--}}


{{--                    <form action="{{ route('maisons.destroy',$maison->id) }}" method="POST">--}}
{{--                        <a class="btn btn-info" href="{{ route('maisons.show',$maison->id) }}">Afficher</a>--}}
{{--                        <a class="btn btn-primary" href="{{ route('maisons.edit',$maison->id) }}">Edit</a>--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <button class="btn btn-danger" type="submit"> Delete <i class="fa fa-trash"></i></button>--}}
{{--                    </form>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--    </table>--}}
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
                <li><a href="{{ route('maisons.index')}}">Appartement</a></li>
            </ol>
        </div>
    </div>
</section>

    <section class="latest_blog_area section_gap">


        <div class="container">

            <div class="section_title text-center">

{{--                <h3 class="title_color">Les Appartements</h3> <br>--}}
{{--                <a href="/maisons/create" class="genric-btn info-border circle">Ajouter</a>--}}
                @if(Auth::check())
                    <a href="/maisons/create" class="genric-btn info-border circle">Ajouter un Appartement</a>
                @else
                    <a href="{{ route('login') }}" class="genric-btn info-border circle">Ajouter un Appartement</a>
                @endif
{{--                <p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from </p>--}}
            </div>
            <div class="row mb_30">
                @foreach ($maisons as $maison)
                <div class="col-lg-4 col-md-6">
                    <div class="single-recent-blog-post">
                        <div class="thumb">
                           <a href="{{ route('maisons.show',$maison->id) }}">
                               <img class="img-fluid" src="{{asset('upload/'."".$maison->image)}}" alt="Norway">
                           </a>
                        </div>
                        <div class="details">
                            <div class="tags">
                                <center><h4 class="sec_h4">{{$maison->ville->name}}</h4></center>
                                <center><h6 class="date title_color">{{ $maison->created_at->format('d M Y - H:i:s') }}</h6></center>
                                <a href="#" class="button_hover tag_btn">chambres :{{ $maison->nombre_de_chambre }}</a>
                                <a href="#" class="button_hover tag_btn">Surface :{{ $maison->surface }}</a>
                                <a href="#" class="button_hover tag_btn">Prix :{{ $maison->prix }} MAD</a>
                                <center>
                                    <a href="#" class="button_hover tag_btn">Chauffage :{{ $maison->chauffage }}</a>
                                    <a href="#" class="button_hover tag_btn">Climatisation :{{ $maison->climatisation }}</a>
                                </center>



                            </div>
                            <center>
                                <form action="{{ route('maisons.destroy',$maison->id) }}" method="POST">
                                    <a class="genric-btn primary-border circle" href="{{ route('maisons.show',$maison->id) }}">Afficher &#160;     &#160; <i class="fa fa-eye" aria-hidden="true"></i></a>
                                    @can('update', $maison)
                                    <a  class="genric-btn primary-border circle" href="{{ route('maisons.edit',$maison->id) }}">Edit &#160;     &#160;  <i class="fa fa-edit"></i></a>
                                    @endcan
                                    @csrf
                                    @method('DELETE')
                                    @can('delete', $maison)
                                    <button class="genric-btn primary-border circle" type="submit"> Delete&#160;&#160; <i class="fa fa-trash"></i></button>
                                    @endcan
                                </form>
                            </center>


                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
