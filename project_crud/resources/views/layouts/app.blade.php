<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>@yield('title')</title> --}}
    <title>
        @hasSection ('title')
            @yield('title') | Student CRUD
        @else
            Student CRUD
        @endif
        
    </title>
    @vite(['resources/sass/app.scss' , 'resources/js/app.js'])
</head>
<body class="bg-dark">
    <div id="id">
        <main class="p-4">
            @yield('content')
        </main>
    </div>
</body>
</html>