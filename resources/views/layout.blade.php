<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('styles/styles.css')}}">
    <script src="https://kit.fontawesome.com/0f29da6843.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <x-header/>
    </header>    
    <main>
        @yield('content')
    </main>
    <footer>
        <x-footer/>
    </footer>
</body>
</html>
