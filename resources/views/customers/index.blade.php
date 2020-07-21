@extends('layouts.app')

@section('title', 'Customer List')

{{--<ul>
    <li><a href="/">Home Page</a></li>
    <li><a href="about">About us</a></li>
    <li><a href="contact">Contact</a></li>
    <li><a href="customers">Customers</a></li>
</ul>--}}

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Customer List</h1>
            <p><a href="{{ route('customers.create') }}" class="btn btn-primary">Create new customer</a></p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Company name</th>
                    <th scope="col">Status</th>
                    <th scope="col" style="width: 25%" >Actions</th>
                </tr>
                </thead>
                    <tbody>
                        @foreach($customers as $customer)
                                @if($customer->active == 'Active')
                                    <tr style="background-color: lightgreen;">
                                @elseif($customer->active == 'Inactive')
                                    <tr style="background-color: lightcoral;">
                                @else
                                    <tr style="background-color: lightgrey;">
                                @endif
                                        <th scope="row">{{ $customer->id }}</th>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->company->name }}</td>
                                        <td>{{ $customer->active }}</td>
                                        <td><a href="/customers/{{ $customer->id }}" role="button" class="btn btn-primary">Show</a>
                                            <a href="/customers/{{ $customer->id }}/edit" role="button" class="btn btn-warning">Edit</a>
                                            <form action="/customers/{{ $customer->id }}" method="POST" style="display: inline;" >
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>


@endsection
