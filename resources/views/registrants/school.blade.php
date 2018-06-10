@extends('layouts.app')

@section('content')
<div class="image-container" style="position: relative; height: 14rem; border-bottom: 10px;">
    <div class="image-child" style="position: absolute; top: 50%; left:50%; transform: translate(-50%,-50%);">
        <img style="border: none" src="{{asset('images/'.$image)}}" height="150" width="150">
    </div>
</div>
<div style="text-align:center; margin-bottom:50px">
    <p style="font-family: 'Raleway', sans-serif; font-size: 25px; font-align: center;" class="school-name">{{$school}}</p>
</div>

<h5>Competitors</h5>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Telephone</th>
            <th scope="col" style="text-align: center;">T-shirt Size</th>
            <th scope="col" style="text-align: center;">Confirmation Status</th>
            <th scope="col" style="text-align: center;">Register</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $registrant)
            <tr>
                <td>{{$registrant['name']}}</td>
                <td>{{$registrant['email']}}</td>
                <td>{{$registrant['telephone']}}</td>
                <td style="text-align: center;">{{$registrant['t-shirt']}}</td>
                <td style="text-align: center;"> @if ($registrant['confirmed'] == 0) No @else Yes @endif </td>
                <td style="text-align: center;"><input type="checkbox" aria-label="Checkbox for following text input"></td>
            </tr>
        @endforeach
    </tbody>
</table>
<div style="margin-bottom:70px"></div>
<h5>Participants</h5>
<table class="table table-hover table-nonfluid">
    <thead>
    <tr>
        <th>Name</th>
        <th style="text-align: center;">Confirmation Status</th>
        <th style="text-align: center;">Register</th>
    </tr>
    </thead>
    <tbody>
    @foreach($extras as $extra)
        <tr class="fit">
            <td>{{$extra['name']}}</td>
            <td style="text-align: center;">@if ($extra['confirmed'] == 0) No @else Yes @endif</td>
            <td style="text-align: center;"><input type="checkbox" aria-label="Checkbox for following text input"></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
