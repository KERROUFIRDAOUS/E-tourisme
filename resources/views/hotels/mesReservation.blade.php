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
                            <li class="nav-item active"><a class="nav-link" href="{{ route('mesReservation')}}">Mes Reservations</a></li>
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
                <h2 class="page-cover-tittle f_48">- Mes reservations -</h2>

            </div>
        </div>
    </section>
{{--    @if(! empty($reservations))--}}
    <div class="card-body"> <br>
       <center><h3>Mes réservations</h3></center> <br><br>
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <th>
                    Mon nom
                </th>
                <th>
                    Télephone
                </th>
                <th>
                    Hotel resérvé
                </th>
                <th>
                    Prix
                </th>
                <th>
                    Chambres
                </th>
                <th>
                    Adults
                </th>
                <th>
                    Enfants
                </th>
                <th>
                    Date d'entrée
                </th>
                <th>
                    Date de sortie
                </th>
                <th>
                    Validation
                </th>
                </thead>
                <tbody>
                @php
                    $reservations = \App\Reservation::where('user_id',Auth::user()->id)->get();
                @endphp
                @foreach($reservations as $reservation)
                    <tr>
                        <td> {{$reservation->user->name}} </td>
                        <td> {{$reservation->user->phone}} </td>
                        <td> {{$reservation->hotel['name'] }} </td>
                        <td> {{$reservation->hotel['price'] }} </td>
                        <td> {{$reservation->rooms}} </td>
                        <td> {{$reservation->adults}} </td>
                        <td> {{$reservation->children}} </td>
                        <td> {{$reservation->checkin}} </td>
                        <td> {{$reservation->checkout}} </td>
                        <td>


                            @if($reservation->status == 'pending')
                                <span class="badge badge-dark">
                                                    Pas de réponse
                                            </span>
                            @elseif($reservation->status == 'Accepté')
                                <span class="badge badge-success">
                                                    {{$reservation ->status}}
                                            </span>
                            @else($reservation->status == 'Refusé')
                                <span class="badge badge-danger">
                                                    {{$reservation ->status}}
                                            </span>
                            @endif
                        </td>
                @endforeach
                </tbody>
            </table>
        </div>
    </div> <br><br>
{{--    @else--}}
{{--        <div class="card-body"> <br>--}}
{{--            <div class="table-responsive">--}}
{{--                 <h3 align="center" class="text" >Vous n'avez aucune reservation</h3>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}

@endsection
