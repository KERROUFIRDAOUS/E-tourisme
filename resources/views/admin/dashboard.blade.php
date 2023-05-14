@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
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

                                <h3 align="center" class="text" style="font-weight: bold;">{{count($hotels)}}</h3>

                                <h6 align="center" class="stats-title">All Hotels</h6>
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

                                <h3 align="center" class="text" style="font-weight: bold;">{{count($reservations)}}</h3>

                                <h6 align="center" class="stats-title">Reservations</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="statistics">
                            <div class="info">
                                <center>
                                    <div class="icon text-danger">
                                        <h1>
                                            <i class="now-ui-icons users_circle-08"></i>
                                        </h1>
                                    </div>
                                </center>

                                <h3 align="center" class="text" style="font-weight: bold;">{{count($users)}}</h3>

                                <h6 align="center" class="stats-title">Users</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="statistics">
                            <div class="info">
                               <center>
                                   <div class="icon text-success">
                                       <h1>
                                           <i class="now-ui-icons ui-2_chat-round"></i>
                                       </h1>
                                   </div>
                               </center>

                                 <h3 align="center" class="text" style="font-weight: bold;">{{count($messages)}}</h3>

                                <h6 align="center" class="stats-title">Messages</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> <center> Welcome  Admin  </center> </h4>
                </div>
<center>
    <div class="col-lg-4">
        <div class="card card-chart">
            <div class="card-header">
                <h4 class="card-title">Reservations</h4>
                <div class="dropdown">

                    <div class="dropdown-menu dropdown-menu-right" style="">
{{--                        <a class="dropdown-item" href="#">Action</a>--}}
{{--                        <a class="dropdown-item" href="#">Another action</a>--}}
{{--                        <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                        <a class="dropdown-item text-danger" href="#">Remove Data</a>--}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="panel-body">
                    @php
                    $dataPoints = array(

                        array("label"=>"New", "symbol" => "Si","y"=>$newreservationsperc,"z"=>$newreservations),
                        array("label"=>"Refused", "symbol" => "Si","y"=>$Refusedreservationsperc ,"z"=>$Refusedreservations),
                        array("label"=>"Accepted Reservations", "symbol" => "O","y"=>$acceptedreservationsperc,"z"=> $acceptedreservations),
                    )
                    @endphp

                    <div id="chartContainer" style="height: 400px; width: 100%;"></div>
                </div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

            </div>
        </div>
    </div>
</center>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        window.onload = function () {


            var chart = new CanvasJS.Chart("chartContainer", {
                theme: "light",
                animationEnabled: true,

                data: [{
                    type: "doughnut",
                    yValueFormatString: "#,##0\"%\"",
                    showInLegend: true,
                    legendText: "{label}  : {z} " ,
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]

            });
            chart.render();
        }
    </script>
@endsection
