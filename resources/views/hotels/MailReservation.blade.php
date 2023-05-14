
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                    </h4>
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}
                        </div>
                    @endif
                </div>
                <h1>You have a new reservation</h1>
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
                                rooms
                            </th>
                            <th>
                                adults
                            </th>
                            <th>
                                children
                            </th>
                            <th>
                                checkin
                            </th>
                            <th>
                                checkout
                            </th>
                            </thead>
                            <tbody>
                            @php
                                $reservations = \App\Reservation::all();
                            @endphp
                            @foreach($reservations as $reservation)
                                <tr>
                                    <td> {{$reservation->user->name}} </td>
                                    <td> {{$reservation->user->phone}} </td>
                                    <td> {{$reservation->hotel->name}} </td>
                                    <td> {{$reservation->hotel->price}} </td>
                                    <td> {{$reservation->rooms}} </td>
                                    <td> {{$reservation->adults}} </td>
                                    <td> {{$reservation->children}} </td>
                                    <td> {{$reservation->checkin}} </td>
                                    <td> {{$reservation->checkout}} </td>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
