@extends('layouts.app')

@section('title', 'Add new customer')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Add new customer</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{ route('customers.store') }}" method="POST" class="pb-5">
                @include('customers.form')

                <button class="btn btn-success" type="submit">Add customer</button>
            </form>
        </div>
    </div>

@endsection
