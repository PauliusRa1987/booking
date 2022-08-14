@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container div-btn-box1 mt-5">
    <div class="card-deck mb-3 text-center col-3 m-5">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Server side</h4>
            </div>
            <div class="card-body">
                <a href="{{route('country-index')}}" class="btn btn-lg btn-block btn-outline-primary">Go!</a>
            </div>
        </div>
    </div>
    <div class="card-deck mb-3 text-center col-3 m-5">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Client Side</h4>
            </div>
            <div class="card-body">
                <a href="{{route('front-page')}}" class="btn btn-lg btn-block btn-outline-primary">Check!</a>
            </div>
        </div>
    </div>
    
</div>
@endsection
