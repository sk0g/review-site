<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
        @yield('scripts')
        <script>
            var msg   = '{{Session::get('alert')}}';
            var exist = '{{Session::has('alert')}}';
            if(exist){
                alert(msg);
            }
        </script>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    <title>
        @yield('title')
    </title>
</head>

<body>
    @include('layouts/nav-bar')

    @yield('body')
</body>

</html>