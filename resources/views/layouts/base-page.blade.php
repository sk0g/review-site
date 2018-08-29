<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
        @yield('scripts')

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>
        @yield('title')
    </title>
</head>

<body>
    @include('layouts/nav-bar')

    @yield('body')
</body>

</html>