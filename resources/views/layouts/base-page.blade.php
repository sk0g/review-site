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
    @include('layouts/nav-bar')

    @yield('body')
</body>

</html>