<!doctype html>
<html>
<head>
    <title>INCOHST 2018</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <meta charset="utf-8">
</head>
<body>
    <h5>Participants for INCOHST 2018</h5>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Telephone</th>
                <th scope="col">School</th>
                <th scope="col">T-shirt Size</th>
                <th scope="col">Confirmation Status</th>
                <th scope="col">Register</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $registrant)
            <tr>
                <th scope="row">{{$registrant['id']}}</th>
                <td>{{$registrant['name']}}</td>
                <td>{{$registrant['email']}}</td>
                <td>{{$registrant['telephone']}}</td>
                <td>{{$registrant['school']}}</td>
                <td>{{$registrant['t-shirt']}}</td>
                <td>{{$registrant['confirmed']}}</td>
                <td><input type="radio" aria-label="Radio button for following text input"></td>
            </tr>
            @endforeach
            </tbody>
        </table>
</body>
</html>