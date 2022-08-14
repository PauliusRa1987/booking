@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">
                    Hotel
                </div>
                <form action="{{route('hotel-update', $hotel)}}" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Hotel Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="hotel_name" value="{{$hotel->hotel_name}}">
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="country_id" class="col-sm-4 col-form-label ">Countries</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="country_id" name="country_id">
                                    <option value="">-Country-</option>
                                    @foreach($countries as $country)
                                    <option value="{{$country->id}}" @if($country->id == $hotel->country_id) selected @endif>{{$country->country_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-2 justify-content-center">
                            <img style="width: 100px" src="{{$hotel->photo}}" alt="hotel_image">
                        </div>
                        <div class="form-group juusti row mt-2">
                            <label for="image" class="col-sm-4 col-form-label">Hotel Image</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" id="image" name="hotel_image"/>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="price" class="col-sm-4 col-form-label">Price</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="price" name="price" value="{{$hotel->price}}">
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="duration" class="col-sm-4 col-form-label">Duration</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="duration" name="duration" value="{{$hotel->duration}}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between ">
                        <button class="btn btn-outline-success " type="submit">Update Info</button>
                        <a class="btn btn-outline-primary" href="{{route('hotel-index')}}">To the List</a>
                        @csrf
                        @method('put')
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection