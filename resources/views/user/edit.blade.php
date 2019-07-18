@extends('layouts.sbadmin')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
            <img src="storage/img/profile/{{Auth::user()->image}}" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{Auth::user()->name}}</h5>
                <p class="card-text">{{Auth::user()->email}}</p>
            <p class="card-text"><small class="text-muted">Member since {{Auth::user()->created_at->format('d F Y')}}</small></p>
            </div>
            </div>
        </div>
    </div>
@endsection
