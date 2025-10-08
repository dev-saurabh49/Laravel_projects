<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Change Password Page</h1>
    <form action="{{route('changepasswordcode')}}" method="POST">
        @csrf
        old pass <input type="password" name="opass"> <br>
        New pass <input type="password" name="npass"> <br>
        confirm new pass <input type="password" name="cpass"> <br>
        <button>Change Password</button>
    </form>
</body>
</html>