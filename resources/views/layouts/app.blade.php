<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link 
            rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
            crossorigin="anonymous"
    >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
    <title>Get-hygge</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
    <nav class="p-2 h-24 bg-white flex justify-between">
        <ul class="flex items-center">
            <li>
                <a href="{{ route('home') }}" class="p-3">Home</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('posts') }}" class="p-3">Post</a>
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
                    <a href="{{ route('profile', auth()->user()->id) }}" class="p-3">
                        <img class="w-12 h-12 object-cover  rounded-full" src="/uploads/avatars/{{ auth()->user()->avatar }}" alt="">
                    </a>
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

    <script src="https://unpkg.com/htmx.org@1.8.4" integrity="sha384-wg5Y/JwF7VxGk4zLsJEcAojRtlVp1FKKdGy1qN+OMtdq72WRvX/EdRdqg/LOhYeV" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script src="/js/app.js"></script>

    <script>
        new MultiSelectTag('languages')  // id
    </script>
</body>
</html>