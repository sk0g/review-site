<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
        @yield('scripts')

    <title>
        @yield('title')
    </title>
</head>

<body>
    @yield('body')
    <br> <br>
    @extends('layouts/nav-bar')
</body>

</html>