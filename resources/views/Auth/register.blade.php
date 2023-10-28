<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/register-user" method="post">
        @csrf
        <input name="name" type="name" placeholder="Enter name">
        <input name="email" type="email" placeholder="Enter Email">
        <input name="password" type="password" placeholder="Enter Password">
        <input type="submit">
    </form>
</body>
</html>