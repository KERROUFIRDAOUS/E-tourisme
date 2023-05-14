@extends('layouts.moderateur')

@section('title')
    Reservation hotel
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Reservations
                    </h4>
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                User
                            </th>
                            <th>
                                phone
                            </th>
                            <th>
                                hotel
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Rooms
                            </th>
                            <th>
                                Adults
                            </th>
                            <th>
                                Children
                            </th>
                            <th>
                                checkin
                            </th>
                            <th>
                                checkout
                            </th>
                            <th>
                                Validation
                            </th>
                            </thead>
                            <tbody>
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
                                            <div   class="btn-group" role="group" aria-label="Third group">
                                                <form data-toggle="tooltip" data-placement="top" title="accepte" enctype="multipart/form-data" action="{{route('change-status')}}" method="post" >
                                                    @csrf
                                                    <input  name="reservation_id" type="hidden" value="{{$reservation->id}}"/>
                                                    <input name="reservation_status" type="hidden" value="Accepté"/>
                                                    <a  >
                                                        <button  type="submit" class="btn btn-link">
                                                            <i class="fa fa-check" aria-hidden="true" ></i>
                                                        </button>
                                                    </a>
                                                </form>
                                            </div>
                                            <div   class="btn-group" role="group" aria-label="Third group">
                                                <form data-toggle="tooltip" data-placement="top" title="Refuse" enctype="multipart/form-data" action="{{route('change-status')}}" method="post" >
                                                    @csrf
                                                    <input  name="reservation_id" type="hidden" value="{{$reservation->id}}"/>
                                                    <input name="reservation_status" type="hidden" value="Refusé"/>
                                                    <a  >
                                                        <button  type="submit" class="btn btn-link">
                                                            <i class="fa fa-times" aria-hidden="true"></i>
                                                        </button>
                                                    </a>
                                                </form>
                                            </div>
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
                </div>
            </div>
        </div>
@endsection

@section('scripts')
@endsection
