@extends('layouts.moderateur')

@section('title')
    Hotels
@endsection

@section('content')
    @include('sweetalert::alert')

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new hotel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="enregistrer-hotels" method="POST" enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input name="name" type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Ville:</label>
                            <select name="ville_id" class="form-control">
                                @php
                                    $villes = \App\Ville::all();
                                @endphp
                                @foreach($villes as $ville)
                                    <option value="{{ $ville->id }}">{{ $ville->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Prix:</label>
                            <input type="text" name="base_price" class="form-control"id="recipient-name">
                        </div>
                        <input  name="created_by"  hidden value="{{ Auth::user()->id }}">
                        <div >
                            <label for="recipient-name" class="col-form-label">Image:</label>
                            <input type="file" name="image" class="form-control" method="post" enctype="multipart/form-data"  placeholder="image">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Content:</label>
                            <textarea name="content" class="form-control" id="message-text"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Nombre de chambres:</label>
                            <input name="room"  class="form-control" id="message-text">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">étoiles:</label>
                            <input name="stars"  class="form-control" id="message-text">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> hotels
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">ADD</button>
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
                                Image
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                City
                            </th>
                            <th>
                                price
                            </th>
                            <th>
                                rooms
                            </th>
                            <th>
                                stars
                            </th>
                            <th>
                                Content
                            </th>
                            <th>
                                Edit
                            </th>
                            <th>
                                Delete
                            </th>
                            </thead>
                            <tbody>
                            @foreach($hotels as $hotel)
                                <tr>
                                    <td>
                                        <img src="{{asset('upload/'."".$hotel->image)}}" alt="" style="width:100px; height:100px;">
                                    </td>
                                    <td> {{$hotel->name}} </td>
                                    <td> {{$hotel->ville->name}} </td>
                                    <td> {{$hotel->price}} </td>
                                    <td> {{$hotel->room}} </td>
                                    <td> {{$hotel->stars}} </td>
                                    <td> {{$hotel->content}} </td>
                                    <td>
                                        <a class="btn btn-success" href="{{route('hotel-editer',['id'=>$hotel->id])}}">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('supprimer')}}" method="POST">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" value="{{$hotel->id}}">                                                {{method_field('POST')}}
                                            <button type="submit" class="btn btn-danger ">Delete </button>
                                        </form>
                                    </td>
                                </tr>
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
