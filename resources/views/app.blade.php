<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bootstrap --}}
    <link rel="stylesheet" href="{{ asset('/Assets/Bootstrap/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/Assets/Bootstrap/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/Assets/Bootstrap/bootstrap.min.css') }}">
    {{-- font awesome --}}
    <link rel="stylesheet" href="{{ asset('/Assets/Font_Awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/Assets/Font_Awesome/css/brands.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/Assets/Font_Awesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/Assets/Font_Awesome/css/regular.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/Assets/Font_Awesome/css/solid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/Assets/Font_Awesome/css/svg-with-js.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/Assets/Font_Awesome/css/v4-shims.min.css') }}">
    <!-- import CSS -->
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <!-- import JavaScript -->
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <title>@yield('title')</title>
    {{-- <title>Todo App</title> --}}
</head>
<body>
    @yield('content')
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('/Assets/Bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/Assets/Bootstrap/bootstrap.min.js') }}"></script>
</body>
</html>