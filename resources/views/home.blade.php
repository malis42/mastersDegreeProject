@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style="text-align: center; color: red;"><h1 style="color: #3a8184;"><strong>Master's Degree Project - Web App</strong></h1></div>
           <br/>
            @if(Auth::user())
                @if(!empty(Auth::user()->role_id) && Auth::user()->role_id == 1)
                    <div>
                        <span style="text-align: center;"><h3>Manage your measurements</h3></span>
                        <a href="/measures" class="btn btn-success btn-lg btn-block">Measures</a>
                    </div>
                @elseif(!empty(Auth::user()->role_id) && Auth::user()->role_id == 2)
                    <div>
                        <span style="text-align: center;"><h3>Manage your patients</h3></span>
                        <a href="/patients" class="btn btn-success btn-lg btn-block">Patients</a>
                    </div>
                @endif
                <div style="margin-top: 30px;">
                    <span style="text-align: center;"><h3>Have a question?</h3></span>
                    <a href="/contact" class="btn btn-primary btn-lg btn-block">Send us an email!</a>
                </div>
                <div style="margin-top: 30px;">
                    <span style="text-align: center;"><h3>Read about project</h3></span>
                    <a href="/about" class="btn btn-primary btn-lg btn-block">About us</a>
                </div>
           @else
                <div class="row justify-content-around">
                    <div class="col-6">
                        <span style="text-align: center;"><h3>Don't have an account?</h3></span>
                        <a href="/register" class="btn btn-success btn-lg btn-block">Register here now</a>
                    </div>
                    <div class="col-6">
                        <span style="text-align: center;"><h3>Log into existing account</h3></span>
                        <a href="/login" class="btn btn-success btn-lg btn-block">Log in here</a>
                    </div>
                </div>
                <div style="margin-top: 30px;">
                    <span style="text-align: center;"><h3>Have a question?</h3></span>
                    <a href="/contact" class="btn btn-primary btn-lg btn-block">Send us an email!</a>
                </div>
                <div style="margin-top: 30px;">
                    <span style="text-align: center;"><h3>Read about project</h3></span>
                    <a href="/about" class="btn btn-primary btn-lg btn-block">About us</a>
                </div>
            @endif
        </div>
    </div>

@endsection
