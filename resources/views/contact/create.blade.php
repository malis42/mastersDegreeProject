@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <h1 style="color: #3a8184;"><strong>Contact us!</strong></h1>
    @if(!session()->has('message'))
        <form action="{{ route('contact.store') }}" method="POST">
            <div class="form-group pb-2">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" placeholder="Your name here..."
                       value="{{ old('name') }}"/>
                <div style="color: red; font-weight: bold;">{{ $errors->first('name') }}</div>
            </div>

            <div class="form-group pb-2">
                <label for="email">Email</label>
                <input class="form-control" type="text" name="email" placeholder="Your email here..."
                       value="{{ old('email')}}"/>
                <div style="color: red; font-weight: bold;">{{ $errors->first('email') }}</div>
            </div>

            <div class="form-group pb-2">
                <label for="message">Message</label>
                <textarea name="message" class="form-control" id="message" cols="30" rows="18" placeholder="Your message here...">{{ old('message') }}</textarea>
                <div style="color: red; font-weight: bold;">{{ $errors->first('message') }}</div>
            </div>

            <button class="btn btn-primary" type="submit">Send it!</button>

            @csrf
        </form>
    @endif
@endsection
