@extends('layouts.admin')

@section('title')
    hotel edit
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <center><h3>Edit hotel</h3></center>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <center>
                                    <form action="{{route('updateh',['hotel'=>$hotel->id])}}"  method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('Put')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label" >Name</label>
                                                <input type="text" name="name" value="{{$hotel->name}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label" >Ville</label>
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
                                                <label for="recipient-name" class="col-form-label" >Content</label>
                                                <input type="text" name="content" value="{{$hotel->content}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label" >Room</label>
                                                <input type="text" name="room" value="{{$hotel->room}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label" >Stars</label>
                                                <input type="text" name="starts" value="{{$hotel->stars}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Image:</label>
                                                <input type="file" name="image" class="form-control" method="post" enctype="multipart/form-data"  placeholder="image">
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ url('/ahotels')  }}" class="btn btn-secondary">Back</a>
                                                <button type="submit" class="btn btn-primary">Update </button>
                                            </div>
                                        </div>
                                    </form>
                                </center>
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
