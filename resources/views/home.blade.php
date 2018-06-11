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
@foreach($schools as $school)
<div class="container-fluid">
    <div class="row">
        <div class="sch" style="float: none; margin: 0 auto; width: 500px; border: 1px solid black; padding: 10px 10px 10px 10px;">
            <a style="color:inherit" href="{{'/registrants/'.$school['school']}}">
                <img style="float: left;" src="{{asset('images/'. preg_replace('/\s+/', '', $school['school']).'.png')}}" height="150" width="150">
                <div style="float: right; margin-right: 80px; margin-top: 25px">
                    <p>{{$school['school']}}</p>
                </div>
            </a>
        </div>
    </div>
</div>
<div style="margin-bottom:25px;"></div>
@endforeach
@endsection
