@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">@plannthat</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </div>

                </li>
            </ul>
        </div>
    </nav>

    <div class="flex-center position-ref full-height">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard</div>

                        <div class="card-body d-flex flex-column align-items-center">
                            <img class="avatar" src="https://graph.facebook.com/{{ session('providerId') }}/picture?type=large"/>
                            <strong>{{ auth()->user()->name }}</strong>
                            <small>{{ auth()->user()->email }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
