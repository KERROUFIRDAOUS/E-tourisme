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
                    <h2 class="page-cover-tittle f_48">Ajouter un Nouvel Appartement</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('maisons.index') }}">Les Appartements</a></li>
                        <li><a href="{{ route('maisons.create') }}">Ajouter</a></li>
                    </ol>
                </div>
            </div>
        </section>
        <br/>
        <div class="pull-left">
            <a class="genric-btn warning circle" href="{{ route('maisons.index') }}"> retour </a>
        </div>
        <center>
            <h2 class="mb-30 title_color">Ajouter </h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('maisons.store') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="mt-10">
                    <div class="col-md-6">
                        <div class="text-left">
                            <label>Image</label>
                        </div>
                        <input type="file" name="image" class="form-control" method="post" enctype="multipart/form-data"  placeholder="image">

                        <div class="text-left">
                            <label>Ville</label>
                        </div>
                        <div class="form-select" id="default-select">
                            <select name="ville_id" class="form-control">
                                @php
                                    $villes = \App\Ville::all();
                                @endphp
                                @foreach($villes as $ville)
                                    <option value="{{ $ville->id }}">{{ $ville->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <br/>
                        <div class="text-left">
                            <label>Nombre de chambres</label>
                        </div>
                        <div class="form-group">

                            <input type="text" class="form-control" id="name" name="nombre_de_chambre" value="" placeholder="Nombre">
                        </div>
                        <div class="text-left">
                            <label>Surface</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="surface"  value="" placeholder="Surface">
                        </div>
                        <div class="text-left">
                            <label>Prix</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" placeholder="Prix" name="prix" value="" >
                        </div>
                        <div class="text-left">
                            <label>Chauffage</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email"placeholder="Chauffage" name="chauffage" value="">
                        </div>
                        <div class="text-left">
                            <label>Climatisation:</label>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="email" placeholder="Climatisation" name="climatisation" value="">
                        </div>
                        <div class="text-left">
                            <label>Content:</label>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="email"placeholder="Decription" name="content" value="">
                        </div>
                    </div>
                </div>
                <button type="submit" class="genric-btn warning circle">
                    Ajouter
                </button>

            </form>
            <br/>

        </center>





@endsection
