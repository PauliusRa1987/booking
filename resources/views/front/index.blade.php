@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Our Holidays</h3>
                    <form action="{{route('order-index')}}" method="get">
                        <div class=" header-box div-btn-box2">
                            @include('front.filtre')
                            @include('front.sort')
                        </div>
                    </form>
                </div>
                <div class="div-box">
                    @include('front.search')
                </div>
                <div class="card-body d-flex justify-content-between flex-wrap">
                    @foreach($hotels as $hotel)

                    <div class="card col-3 m-4 ">
                        <div class="card-header">
                            <h3> {{$hotel->country_name}}</h3>
                        </div>
                        <div class="card-body ">
                            <ul class="list-group ">
                                <li class="list-group-item"><b>Hotel Name: </b><i>{{$hotel->hotel_name}}</i></li>
                                <li class="list-group-item"><b>Season: </b><i>{{$hotel->season}}</i></li>
                                <li class="list-group-item"><b>Price: </b><i>$ {{$hotel->price}}</i></li>
                                <li class="list-group-item"><b>Duration: </b><i>{{$hotel->duration}} days</i></li>
                                <li class="list-group-item d-flex justify-content-center"><img style="width: 100px" src="{{$hotel->photo}}" alt="hotel_image"></li>
                            </ul>
                            <div class="d-flex justify-content-between mt-2">
                                @if(Auth::user())
                                <form action="{{route('order-store', $hotel->id)}}" method="post">
                                    <div class="form-group div-btn-box1">
                                        <label>Pick a Date:</label>
                                        <div class="form-row ">
                                            <div class="col-10 m-1">
                                                <input type="date" class="form-control" name="timeD" />
                                            </div>
                                        </div>
                                    </div>
                                    @csrf
                                <button class="btn btn-outline-success mt-2" type="submit">Book Holiday!</button>
                                </form>
                                @else
                                <p>Please Login for book Holiday!</p>
                                @endif
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
