@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as {{Auth::user()->name}}!
                </div>
            </div>
        </div>
    </div>
</div>
<div style="margin-top:50px;"></div>
<div class="row">
    <div style="float: none; margin: 0 auto; width: 500px; padding: 10px 10px 10px 10px;">
        <p>Total competitors: {{App\Http\Controllers\RegistrantsController::countCompetitors()}}</p>
        <p>Total workshop participants: {{App\Http\Controllers\RegistrantsController::countParticipants()}}</p>
    </div>
</div>
<div style="margin-bottom: 25px"></div>
@foreach($schools as $school)
<div class="container-fluid">
    <div class="row">
        <div class="sch" style="float: none; margin: 0 auto; width: 500px; border: 1px solid black; padding: 10px 10px 10px 10px;">
            <a style="color:inherit" href="{{'/registrants/'.$school['school']}}">
                <img style="float: left;" src="{{asset('images/'. preg_replace('/\s+/', '', $school['school']).'.png')}}" height="150" width="150">
                <div style="float: right; margin-right: 50px; margin-top: 25px; width: 200px;">
                    <p>{{$school['school']}}</p>
                    <p>Competitors: {{\App\Http\Controllers\RegistrantsController::countRelevantCompetitors($school['school'])}}</p>
                    <p>Workshop Participants: {{App\Http\Controllers\RegistrantsController::countRelevantParticipants($school['school'])}}</p>
                </div>
            </a>
        </div>
    </div>
</div>
<div style="margin-bottom:25px;"></div>
@endforeach
@endsection
