@extends('layouts.admin')

@section('title')
    Villes
@endsection

@section('content')
    @include('sweetalert::alert')

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new ville</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/save-villes" method="POST" enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Name:</label>
                                <input name="name" type="text" class="form-control" id="recipient-name">
                            </div>
                        <div >
                            <label for="recipient-name" class="col-form-label">Image:</label>
                            <input type="file" name="image" class="form-control" method="post" enctype="multipart/form-data"  placeholder="image">
                        </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Content:</label>
                                <textarea name="content" class="form-control" id="message-text"></textarea>
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
                    <h4 class="card-title"> Villes
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">ADD</button>
                    </h4>

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
                                @foreach($villes as $ville)
                                    <tr>
                                        <td>
                                            <img src="{{asset('upload/'."".$ville->image)}}" alt="" style="width:100px; height:100px;">
                                        </td>
                                        <td> {{$ville->name}} </td>
                                        <td> {{$ville->content}} </td>
                                        <td>
                                            <a class="btn btn-success" href="{{route('ville-edit',['id'=>$ville->id])}}">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('destroyv')}}" method="POST">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$ville->id}}">                                                {{method_field('POST')}}
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
