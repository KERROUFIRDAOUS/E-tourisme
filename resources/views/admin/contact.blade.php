@extends('layouts.admin')

@section('title')
    Maisons
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Messages
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
                                Object
                            </th>
                            <th>
                                message
                            </th>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td> {{$contact->user->name}} </td>
                                    <td> {{$contact->title}} </td>
                                    <td> {{$contact->message}} </td>
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
