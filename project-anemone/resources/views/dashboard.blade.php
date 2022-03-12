@extends('master')

@section('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">User Registration and Login</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">Navbar</a>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white"> Welcome: {{ ucfirst(Auth()->user()->first_name) }} </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('logout') }}"> Logout </a>
            </li>
        </ul>
    </div>
</nav>

@endsection