<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1>user name : {{$user->username}}</h1> <br>
    <h1>verify your account</h1> <br>
    <hr>
    <div style="background:blue"> <a href="{{route('verifyemail',[$user->verify_token])}}">Click here to verify </a></div>
</body>
</html>