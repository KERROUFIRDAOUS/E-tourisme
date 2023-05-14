@extends('layouts.admin')

@section('title')
    Register
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Registerd roles</h4>
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
                                Name
                            </th>
                            <th>
                                phone
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                User type
                            </th>
                            <th>
                                Edit
                            </th>
                            <th>
                                Delete
                            </th>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td> {{$user->name}} </td>
                                    <td> {{$user->phone}} </td>
                                    <td> {{$user->email}} </td>
                                    <td> {{$user->usertype}} </td>
                                    <td>
                                        <a class="btn btn-success" href="/role-edit/{{$user->id}}">Edit</a>
                                    </td>
                                    <td>
                                        <form action="/role-delete/{{$user->id}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button href="/role-delete/{{$user->id}}" class="btn btn-danger"> DELETE</button>
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
