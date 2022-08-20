@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Order List</h3>
                    <div class=" header-box">
         
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                            <th scope="col">Client</th>
                                <th scope="col">Hotel Name</th>
                                <th scope="col">Country</th>
                                <th scope="col">Price</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                            <form action="{{route('order-update', $order)}}" method="POST">
                                <tr>
                                <td class="text-center">{{$order->getUserInfo->name}}</td>
                                    <td class="text-center">{{$order->getHotelInfo->hotel_name}}</td>
                                    <td class="text-center">{{$order->getHotelInfo->getCountryInfo->country_name}}</td>
                                    <td class="text-center">$ {{$order->getHotelInfo->price}}</td>
                                    <td class="text-center">{{$order->getHotelInfo->duration}} days</td>
                                    <td class="text-center">{{$order->status}}</td>
                                    
                                    <td>
                                        <div class="d-flex justify-content-end ">
                                            @csrf
                                            @method('put')
                                            <button class="btn btn-outline-warning m-2 " type="submit">Approve</button>
                                        <a class="btn btn-outline-success m-2 " href="{{route('order-pdf_print', $order)}}">Print pdf</a>
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
