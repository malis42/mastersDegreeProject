@extends('layouts.app')

@section('title', 'Measure list')

@section('content')
    <div class="row">
        <div class="col-8">
            <h2>Latest measure</h2>
        </div>
        <div class="col-4">
            <a href="/measures/create" class="btn btn-success" role="button" style="display: flex; align-items: center; justify-content: center;">Add new measure!</a>
        </div>
    </div>

    <div class="row">
            <div class="col-12">
                @if($latestMeasure)
                    <p>Measure ID: {{ $latestMeasure->id }}</p>
                    <p>Measure created at: {{ $latestMeasure->created_at }}</p>
                    <canvas id="myChart" ></canvas>
                @else
                    <p>You have no measures to show!</p>
                @endif
            </div>
    </div>


    @if($remainingMeasures->count() > 0)
        <hr/>
        <h3>History measures</h3>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="width: 15%">#</th>
                        <th scope="col" style="width: 45%">Created at</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                        <tbody>
                            @foreach($remainingMeasures as $measure)
                                <tr>
                                    <th scope="row">{{ $measure->id }}</th>
                                    <td>{{ $measure->created_at }}</td>
                                    <td><a href="/measures/{{ $measure->id }}" role="button" class="btn btn-primary">View</a>
                                        <form action="/measures/{{ $measure->id }}" method="POST" style="display: inline;">
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
    @endif
@endsection

@section('scripts')
    @if($latestMeasure)
    <script>
        var measureData = {
            {{ substr(str_replace('"', '', (string)$latestMeasure->measure), 1, -1) }}
        };
        var measureValues = Object.values(measureData);
        var yAxisMin = measureValues[0];
        var yAxisMax = measureValues[0];
        var i;
        for(i = 1; i<measureValues.length; i++){
            if(measureValues[i] < yAxisMin) yAxisMin = measureValues[i];
            if(measureValues[i] > yAxisMax) yAxisMax = measureValues[i];
        }
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels : Object.keys(measureData),
                datasets: [{
                    label: 'Measure #{{ $latestMeasure->id }}',
                    data: measureValues,
                    fill: false,
                    pointRadius: 0,
                    borderColor: "#3e95cd",
                }],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            min: yAxisMin - 0.02,
                            max: yAxisMax + 0.02,
                            step: 10
                        }
                    }]
                }
            }
        });
        console.log(Object.values(measureData)[0]);


      /*  // Send POST request with AJAX to change displayed measure on index page
        $(document).ready(function($) {
            $('#measureSelect').change(function(e){
                var selectedOptionId = $(this).val();
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ url("measures") }}',
                    data: {
                        id: selectedOptionId
                    },
                    beforeSend: function () {
                        console.log(selectedOptionId);
                    },
                })

            });
        })*/

    </script>


    @endif


@endsection
