@extends('layouts.moderateur')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> <center> Welcome  Modérateur  </center> </h4>
                </div>

                <div class="col-md-12">
                    <div class="card card-stats">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <div class="statistics">
                                        <div class="info">
                                            <center>
                                                <div class="icon text-info">
                                                    <h1>
                                                        <i class="now-ui-icons objects_globe"></i>
                                                    </h1>
                                                </div>
                                            </center>


                                            @if(count($hotels) > 0)
                                                <h3 align="center" class="text" style="font-weight: bold;">{{count($hotels)}}</h3>
                                            @else
                                                <h3 align="center" class="text">There is no hotels</h3>
                                            @endif
                                            <a href="hotels" class="text-dark">
                                                <h6 align="center" class="stats-title">My Hotels</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="statistics">
                                        <div class="info">
                                            <center>
                                                <div class="icon text-warning">
                                                    <h1>
                                                        <i class="now-ui-icons ui-1_bell-53"></i>
                                                    </h1>
                                                </div>
                                            </center>
                                            @if(! empty($reservations))
                                                <h3 align="center" class="text" style="font-weight: bold;">{{count($reservations)}}</h3>

                                            @else
                                                <h3 align="center" class="text" >There is no Data</h3>
                                            @endif

                                            <a href="reservation" class="text-dark">
                                                <h6 align="center" class="stats-title">Reservations</h6>
                                            </a>

                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
