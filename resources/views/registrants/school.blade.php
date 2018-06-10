<!doctype html>
<html>
<head>
    <title>INCOHST 2018</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <style>
        .table-nonfluid {
            width: auto !important;
        }
    </style>
</head>
<body>
<img src="{{asset('images/'.$image)}}" height="150" width="150">
<h3>{{$school}}</h3>
<h5>Participants</h5>
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
</body>
</html>