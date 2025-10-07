<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Step - 1</title>
</head>
<body>
    <h1>Step -1 Form</h1>
    <form action="{{'step1_code'}}" method="post">
        @csrf
        Name : <input type="text" name="name"> <br>
        Email : <input type="email" name="email" id=""> <br>
        City : <input type="text" name="city">
        <br>
        <button type="button">Next</button>
    </form>
</body>
</html>