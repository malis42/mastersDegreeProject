@extends('layouts.app')

@section('title', 'Edit details for ' . $customer->name)

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Edit details for {{ $customer->name }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{ route('customers.update', ['customer' => $customer]) }}" method="POST" class="pb-5">
                @method('PATCH')

                @include('customers.form')

                <button class="btn btn-success" type="submit">Save customer changes</button>
            </form>
        </div>
    </div>

@endsection
