@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">
                    Countries
                </div>
                <form action="{{route('country-store')}}" method="post">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Country</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="country_name">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="season" class="col-sm-4 col-form-label">Season</label>
                            <div class="col-sm-8">
                                <select class="form-control " id="season" name="season">
                                    <option value="spring">Spring</option>
                                    <option value="summer">Summer</option>
                                    <option value="autumn">Autumn</option>
                                    <option value="winter">Winter</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <button class="btn btn-outline-success " type="submit">Add</button>
                        <a class="btn btn-outline-primary" href="{{route('country-index')}}">To the List</a>
                        @csrf
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
