<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
    <title>Get-hygge</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between">
        <ul class="flex items-center">
            <li>
                <a href="{{ route('home') }}" class="p-3">Home</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="" class="p-3">Post</a>
            </li>
            <li>
                <a href="{{ route('country') }}" class="p-3">Country</a>
            </li>
            <li>
                <a href="{{ route('language') }}" class="p-3">Language</a>
            </li>
        </ul>
        @auth
        <ul class="flex items-center">
            <li>
                <div class="flex ">
                    <img class="w-12 h-12 object-cover  rounded-full" src="/uploads/avatars/{{ auth()->user()->avatar }}" alt="">
                    <a href="" class="p-3">{{auth()->user()->name . " " . auth()->user()->lastname}}</a>
                </div>
            </li>
            <li>
                <a href="{{ route('logout') }}" class="p-3">Logout</a>
            </li>
        </ul>
        @endauth
        @guest
        <ul class="flex items-center">
            <li>
                <a href="{{ route('login') }}" class="p-3">Login</a>
            </li>
            <li>
                <a href="{{ route('signup') }}" class="p-3">Signup</a>
            </li>
        </ul>
        @endguest
    </nav>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('languages')  // id
    </script>
</body>
</html>