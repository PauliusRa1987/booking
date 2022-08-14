@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>My Orders</h3>
                    <div class=" header-box">
                        <a class="btn btn-outline-primary" href="{{route('order-index')}}">Book new Holiday</a>
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
                                <th scope="col">Order Status</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                            <form action="{{route('order-destroy', $order)}}" method="POST">
                                <tr>
                                    <td class="text-center">{{$order->getHotelInfo->hotel_name}}</td>
                                    <td class="text-center">{{$order->getHotelInfo->getCountryInfo->country_name}}</td>
                                    <td class="text-center">$ {{$order->getHotelInfo->price}}</td>
                                    <td class="text-center">{{$order->getHotelInfo->duration}} days</td>
                                    <td class="text-center">{{$order->status}}</td>
                                    <td class="text-center"><img src="{{$order->getHotelInfo->photo}}" alt="hotel_image"></td>
                                    
                                    <td>
                                        <div class="d-flex justify-content-end ">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger m-2 " type="submit">Cancel</button>
                                        </div>
                                    </td>
                                </tr>
                            </form>
                            @empty
                            <h3>List is empty</h3>
                            @endforelse
                        <tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
