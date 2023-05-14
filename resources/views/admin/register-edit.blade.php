@extends('layouts.admin')

@section('title')
    Register edit
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <center><h3>Edit User</h3></center>
                    </div>
                    <div class="card-body">
                       <div class="row">
                           <div class="col-md-6">
                               <center>
                                   <form action="/role-register-update/{{$users->id}}" method="POST">
                                       {{csrf_field()}}
                                       {{method_field('PUT')}}
                                       <div class="form-group">
                                           <label>Name</label>
                                           <input type="text" name="username" value="{{$users->name}}" class="form-control">
                                       </div>
                                       <div class="form-group">
                                           <select name="usertype" class="form-control">
                                               <option value="admin">Admin</option>
                                               <option value="admin">moderateur</option>
                                               <option value="">Normal user</option>
                                           </select>
                                       </div>
                                       <button type="submit" class="btn btn-success ">Update </button>
                                       <a href="/role-register" class="btn btn-danger ">Cancel </a>
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
