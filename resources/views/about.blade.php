@extends('layouts.app')

@section('title', 'About us')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 style="color: #3a8184;"><strong>About author</strong></h1>
            <div class="row">
                <div class="col-9">
                    <h2>Mateusz Lis</h2>
                    <h3>I'm an undergraduate at University of Science and Technology in Cracow, Poland. I graduated in Biomedical Engineering back in 2018, currently finishing my master's degree course in Biomechanics and Robotics.</h3>
                    <br>
                    <a href="https://www.linkedin.com/in/mateusz-lis-60aa17140/" class="btn btn-outline-info">
                        <i class="fab fa-linkedin fa-2x"></i>
                        <span style="font-size: 30px; text-align: center; padding-left: 10px;">My LinkedIn Profile</span>
                    </a>
                </div>
                <div class="col-3">
                    <img src="https://avatars1.githubusercontent.com/u/51505454?s=400&u=400599d00a9e9634515a1a35fc3f2d098482d85b&v=4" style="width: 200px; height: 200px;" class="rounded-circle"/>
                </div>
            </div>
        </div>

        <div class="col-12" style="margin-top: 50px;">
            <h1 style="color: #3a8184; "><strong>MDP Web App - about project</strong></h1>
            <h3>
                MPD is an acronym for Master's degree project.
                This web app was created as a part of the final project titled
                <i>"Design monitoring system for abnormal gait diagnosis".</i>
                <br/>
                <br/>
                Second part of this project includes usage of Raspberry Pi 3B+,
                and an ADXL345 accelerometer connected to it.
                <br><br>
                You can find full documentation and source code on my GitHub profile.
                <br><br>
                <a href="https://github.com/malis42/mastersDegreeProject" class="btn btn-outline-success">
                    <i class="fab fa-github fa-2x"></i>
                    <span style="font-size: 30px; text-align: center; padding-left: 10px;">Click Here</span>
                </a>
            </h3>
        </div>
    </div>
@endsection
