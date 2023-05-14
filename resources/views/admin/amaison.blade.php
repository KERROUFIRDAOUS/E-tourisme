@extends('layouts.admin')

@section('title')
    Maisons
@endsection

@section('content')
    @include('sweetalert::alert')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Maison
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
                                City
                            </th>
                            <th>
                                Rooms
                            </th>
                            <th>
                                Surface
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                chauffage
                            </th>
                            <th>
                                climatisation
                            </th>
                            <th>
                                Content
                            </th>
                            <th>
                                Delete
                            </th>
                            </thead>
                            <tbody>
                            @foreach($maisons as $maison)
                                <tr>
                                    <td>
                                        <img src="{{asset('upload/'."".$maison->image)}}" alt="" style="width:100px; height:100px;">
                                    </td>
                                    <td> {{  !empty($maison->ville) ? $maison->ville->name:''  }} </td>
{{--                                    <td> {{  $maison->ville->id }} </td>--}}
                                    <td> {{$maison->nombre_de_chambre}} </td>
                                    <td> {{$maison->surface}} </td>
                                    <td> {{$maison->prix}} </td>
                                    <td> {{$maison->chauffage}} </td>
                                    <td> {{$maison->climatisation}} </td>
                                    <td> {{$maison->content}} </td>
                                    <td>
                                        <form action="{{ route('destroym')}}" method="POST">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" value="{{$maison->id}}">                                                {{method_field('POST')}}
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

