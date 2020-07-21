@extends('layouts.app')

@section('title', 'Measure number ' . $measure->id)

@section('content')
    <div class="row">
        <div class="col-6">
            <a href="/measures" class="btn btn-success mb-2" role="button">Go back!</a>
        </div>
    </div>

    <h3>Your measure number {{ $measure->id }}</h3>
    <div class="row">
        <div class="col-12">
            @if($measure)
                <p>Measure created at: {{ $measure->created_at }}</p>
                <canvas id="myChart" ></canvas>
            @else
                <p>You have no measures to show!</p>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    @if($measure)
        <script>
        var measureData = {
            {{ substr(str_replace('"', '', (string)$measure->measure), 1, -1) }}
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
                    label: 'Measure #{{ $measure->id }}',
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
                            min: yAxisMin - 0.1,
                            max: yAxisMax + 0.1,
                            step: 10
                        }
                    }]
                }
            }
        });
        console.log(measureData)
    </script>
    @endif
@endsection
