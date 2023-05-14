@extends('layouts.userside')
@section('content')

{{--<center>--}}
{{--    <div id="right-side" class="col-md-8">--}}
{{--        <div class="card bg-secondary text-light" >--}}
{{--            <div class="card-header">--}}
{{--                <h3 class="card-title text-center"> Modifier </h3>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <form action="{{ route('maisons.update',$maison->id) }}"  class="contact-form"  method="POST" enctype="multipart/form-data" >--}}
{{--                    @csrf--}}
{{--                    @method('PUT')--}}
{{--                    <strong>Image:</strong>--}}
{{--                    <input type="file" name="image" class="form-control" enctype="multipart/form-data"  placeholder="image"  />--}}
{{--                    <img  src="{{ asset("uploads").\Illuminate\Support\Str::substr($maison->image,35)  }}" class="img-thumbnail" alt="" width="80px"/>--}}
{{--                    <div class="form-group">--}}
{{--                        <strong>ville:</strong>--}}
{{--                        <select name="ville_id" class="form-control">--}}
{{--                            @php--}}
{{--                                $villes = \App\Ville::all();--}}
{{--                            @endphp--}}
{{--                            @foreach($villes as $ville)--}}
{{--                                <option value="{{ $ville->id }}">{{ $ville->name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <strong>nombre_de_chambre:</strong>--}}
{{--                        <input type="text" name="nombre_de_chambre" value="{{$maison->nombre_de_chambre}}"  class="form-control m-1 text-center" >--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <strong>surface:</strong>--}}
{{--                        <input type="text" name="surface" value="{{$maison->surface}}"  class="form-control m-1 text-center" >--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <strong>prix:</strong>--}}
{{--                        <input type="text" name="prix" value="{{$maison->prix}}"  class="form-control m-1 text-center"  >--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <strong>chauffage:</strong>--}}
{{--                        <input type="text" name="chauffage" value="{{$maison->chauffage}}"  class="form-control m-1 text-center">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <strong>climatisation:</strong>--}}
{{--                        <input type="text" name="climatisation" value="{{$maison->climatisation}}" class="form-control m-1 text-center"  >--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <strong>content:</strong>--}}
{{--                        <input type="text" name="content" value="{{$maison->content}}" class="form-control m-1 text-center" >--}}
{{--                    </div>--}}
{{--                    <br/>--}}
{{--                    <button type="submit" class="btn bg-info btn-block text-light m-1"> Edit </button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</center>--}}
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
            <h2 class="page-cover-tittle f_48">Modifier</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('maisons.index') }}">Les Appartements</a></li>
                <li><a href="">Modifier</a></li>
            </ol>
        </div>
    </div>
</section>
<br/>
<br/><br/><br/><br/>
<center>
            <div class="pull-left">
                <a class="genric-btn warning circle" href="{{ route('maisons.index') }}"> retour </a>
            </div>
            <h2 class="mb-30 title_color">Modifier Votre Appartement</h2>
            <form action="{{ route('maisons.update',$maison->id) }}"  class="contact-form"  method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="mt-10">
                    <div class="col-md-6">
                        <div class="text-left">
                            <label>Image</label>
                        </div>
                        <input type="file" name="image" class="form-control" enctype="multipart/form-data"  placeholder="image"  />
                        <img  src="{{ asset("uploads").\Illuminate\Support\Str::substr($maison->image,35)  }}" class="img-thumbnail" alt="" width="80px"/>

                        <div class="text-left">
                            <label>Ville</label>
                        </div>
                        <div class="form-select" id="default-select">
                            <select name="ville_id" class="form-control" style="display: block;">
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

                            <input type="text" class="form-control" id="name" name="nombre_de_chambre" value="{{$maison->nombre_de_chambre}}" placeholder="Enter your name">
                        </div>
                        <div class="text-left">
                            <label>Surface</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="surface" value="{{$maison->surface}}">
                        </div>
                        <div class="text-left">
                            <label>Prix</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="prix" value="{{$maison->prix}}" >
                        </div>
                        <div class="text-left">
                            <label>Chauffage</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="chauffage" value="{{$maison->chauffage}}">
                        </div>
                        <div class="text-left">
                            <label>climatisation:</label>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="climatisation" value="{{$maison->climatisation}}">
                        </div>
                        <div class="text-left">
                            <label>content:</label>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="content" value="{{$maison->content}}">
                        </div>
                    </div>
                </div>
                <button class="genric-btn warning circle">
                    Update
                </button>

            </form>
    <br/>

</center>



</div>

@endsection
