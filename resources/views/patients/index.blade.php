@extends('layouts.app')

@section('title', 'Patient list')

@section('content')
    <h2>List of my patients</h2>
    <div class="row">
        <div class="col-12">
          @if($patients->count() > 0)
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patients as $patient)
                        <tr>
                            <th scope="row">{{ $patient->id }}</th>
                            <td>{{ $patient->full_name }}</td>
                            <td>{{ $patient->email }}</td>
                            <td>
                                <a href="/patients/{{ $patient->id }}" class="btn btn-success" role="button">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          @else
            There is noone who's signed up as your patient!
          @endif
        </div>
    </div>
@endsection
