@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Hotels</h3>
                    <div class=" header-box">
                        <a class="btn btn-outline-primary" href="{{route('hotel-create')}}">Add New</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Hotel Name</th>
                                <th scope="col">Country</th>
                                <th scope="col">Price</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hotels as $hotel)
                            <form action="{{route('hotel-destroy', $hotel)}}" method="POST">
                                <tr>
                                    <td class="text-center">{{$hotel->hotel_name}}</td>
                                    <td class="text-center">{{$hotel->getCountryInfo->country_name}}</td>
                                    <td class="text-center">$ {{$hotel->price}}</td>
                                    <td class="text-center">{{$hotel->duration}} days</td>
                                    <td class="text-center"><img src="{{$hotel->photo}}" alt="hotel_image"></td>
                                    
                                    <td>
                                        <div class="d-flex justify-content-end ">
                                            <a class="btn btn-outline-success m-2 " href="{{route('hotel-edit', $hotel)}}">Edit info</a>
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger m-2 " type="submit">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            </form>
                            @endforeach
                        <tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection