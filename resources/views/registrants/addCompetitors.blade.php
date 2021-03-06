@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Add Participants for {{$school}}</h2>
        <form action="{{route('add_competitors')}}" method="post" style="margin-top: 50px">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Name: </label>
                    <input type="text" name="name">
                    <input type="text" name="school" value="{{$school}}" hidden>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="email">Email: </label>
                    <input type="email" name="email">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="telephone">Name: </label>
                    <input type="text" name="telephone">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="tshirt">T-Shirt Size: </label>
                    <input type="text" name="tshirt">
                </div>
            </div>
            <div class="row" style="margin-top: 20px; margin-bottom: 100px">
                <div class="col-md-2">
                    <button class="btn btn-sm btn-primary btn-block" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection