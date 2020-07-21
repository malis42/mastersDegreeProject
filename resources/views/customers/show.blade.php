@extends('layouts.app')

@section('title', 'Details for ' . $customer->name)

{{--<ul>
    <li><a href="/">Home Page</a></li>
    <li><a href="about">About us</a></li>
    <li><a href="contact">Contact</a></li>
    <li><a href="customers">Customers</a></li>
</ul>--}}

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Details for user: {{$customer->name}}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <a href="{{ route('customers.index') }}" class="btn btn-primary">Go back!</a>
        </div>
    </div>


@endsection
