@extends('layouts.app')

@section('title', 'New measure')

@section('content')
    <h1>{{ $output }}</h1>
    <a href="/measures" class="btn btn-success" role="button">Go back!</a>
@endsection
