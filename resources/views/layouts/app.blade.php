<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Welcome')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])

    @livewireStyles
</head>
<body class="dark:bg-black bg-white/90 @if (Request::is('register', 'login')) bg-[url('/public/images/social.png')] bg-fixed @endif">
    
    @yield('content')

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/preline@1.2.0/dist/preline.min.js"></script>
</body>
</html>