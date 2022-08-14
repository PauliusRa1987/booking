@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Countries</h3>
                    <div class=" header-box">
                    <a class="btn btn-outline-primary" href="{{route('country-create')}}">Add New</a>
                </div>
            </div>
            <div class="card-body d-flex justify-content-between flex-wrap">
                @foreach($countries as $country)
                <div class="card col-3 m-4 ">
                    <div class="card-header">
                        <h3> {{$country->country_name}}</h3>
                    </div>
                    <div class="card-body ">
                        <ul class="list-group ">
                            <li class="list-group-item"><b>Country: </b><i>{{$country->country_name}}</i></li>
                            <li class="list-group-item"><b>Season: </b><i>{{$country->season}}</i></li>
                        </ul>
                        <div class="d-flex justify-content-between ">
                            <a class="btn btn-outline-success m-2 " href="{{route('country-edit', $country)}}">Edit info</a>
                            <form action="{{route('country-destroy', $country)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger m-2 " type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection