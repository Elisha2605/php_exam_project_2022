<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
    <link rel="stylesheet" href="">
    <title>Get-hygge</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-200">
    <nav class="p-4 h-24 bg-white flex justify-between sticky top-0 z-30 w-full">
        <ul class="flex items-center justify-center pl-20">
            @auth
            <li>
                <a class="p-3" href="{{ route('home.show') }}">
                    <img class="w-48" src="/logo.png" alt="">
                </a>
            </li>
            @else
            <li>
                <a class="p-3" href="{{ route('index') }}">
                    <img class="w-48" src="/logo.png" alt="">
                </a>
            </li>
            @endauth
        </ul>
        @auth
        <ul class="flex items-center pr-20">
            <li class="">
                <a href="{{ route('home.show') }}" 
                    class="p-3 hover:bg-indigo-200 rounded-xl">
                    Home
                </a>
            </li>
            <li class="">
                <a href="{{ route('profile.show', auth()->user()) }}" 
                    class="p-3 hover:bg-indigo-200 rounded-xl">
                    Profile
                </a>
            </li>
            <li class="">
                <a href="{{ route('connection.show', auth()->user()) }}" 
                    class="p-3 hover:bg-indigo-200 rounded-xl">
                    Connections
                </a>
            </li>
            @if(auth()->user()->is_admin)
            <li class="">
                <a href="{{ route('admin') }}" 
                    class="p-3 hover:bg-indigo-200 rounded-xl">
                    Admin panel
                </a>
            </li>
            @endif
            |
            @if(count(pendingRequests(auth()->user())) > 0)
            <div class="flex dropdown show pl-3">
                <a class="text-center text-white font-lg bg-red-600 w-10 h-6 ml-3 rounded-full font-light dropdown-toggle" href="#" role="button" id="dropdownPendingRequests" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ count(pendingRequests(auth()->user())) }}
                </a>
                <div class="dropdown-menu w-80 mt-4" aria-labelledby="dropdownPendingRequests">
                    @foreach(pendingRequests(auth()->user()) as $request)
                    <a class="dropdown-item text-sm text-gray-900 font-light grid grid-cols-2 gap-4 w-auto">
                        <div>
                            <img class="w-10 h-10 object-cover rounded-full inline-block" src="/uploads/avatars/{{ $request->avatar }}" alt="">
                            <span class="ml-2">{{ $request->name }} {{ $request->lastname }}</span>
                        </div>
                        <form class="flex justify-end mb-1" action="{{ route('connection.store', $request->user_from) }}" method="POST">
                            @csrf
                            <button type="submit" class="notification-btn bg-gray-800 text-white text-xs font-extralight w-16 focus:outline-none rounded-full">Approve</button>
                        </form>
                    </a>
                    @endforeach
                    <a class="text-gray-900 flex justify-center font-light text-sm" href="{{ route('connection.show', auth()->user()) }}"><span class="hover:text-blue-500">View more..</span></a>
                </div>
            </div>
            @endif           
            <li>
                <div class="flex dropdown show pl-3">
                    <a class="flex flex-row items-center gap-3 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-sm text-gray-900 font-light">{{ auth()->user()->name }} {{ auth()->user()->lastname }}</span>    
                    <img class="w-12 h-12 object-cover rounded-full" src="/uploads/avatars/{{ auth()->user()->avatar }}" alt="">
                    </a> 
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('profile.update.view', auth()->user()->id) }}">Edit profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
            </li>
        </ul>
        @endauth
        @guest
        <ul class="flex items-center pr-20">
            <li>
                <a href="{{ route('login') }}" 
                    class="p-3 hover:bg-indigo-200 rounded-xl">
                    Login
                </a>
            </li>
            <li>
                <a href="{{ route('signup') }}" 
                    class="p-3 hover:bg-indigo-200 rounded-xl ">
                    Signup
                </a>
            </li>
        </ul>
        @endguest
    </nav>
    <div class="w-full h-full bg-gradient-to-r from-sky-500 to-indigo-500">
        @yield('content')
    </div>

    <script src="https://unpkg.com/htmx.org@1.8.4" integrity="sha384-wg5Y/JwF7VxGk4zLsJEcAojRtlVp1FKKdGy1qN+OMtdq72WRvX/EdRdqg/LOhYeV" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script src="/js/app.js"></script>

    <script>
        new MultiSelectTag('languages') // id
    </script>
</body>

</html>