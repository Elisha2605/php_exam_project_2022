@extends('layouts.app')

@section('content')

<div class="w-full h-screen bg-no-repeat bg-center bg-cover fixed" style="background-image: url('/images/bg9.jpg');">
    <div class="h-full flex flex-col pt-36 items-center gap-4">

        <h1 class="text-6xl font-thin">Welcome to <span class="font-bold">get-hygge</span></h1>
        <p class="w-1/2 text-center text-1xl rounded-lg p-3 font-md">
            Our website is designed to help expats network with Danes
            and vice versa. We believe that building relationships and
            understanding between different cultures is essential for a
            successful and peaceful society.
        </p>
        <div class="flex flex-row gap-4">
            <a class="text-3xl hover:bg-sky-500/50 flex justify-center
                            text-black-700 font-thin 
                            py-2 px-4 border-2 border-blue-400
                            rounded-full w-60" href="{{ route('login') }}">Login
            </a>
            <a class="text-3xl hover:bg-red-500/50 flex justify-center
                            text-black-700 font-thin
                            py-2 px-4 border-2 border-red-400
                            rounded-full w-60" href="{{ route('signup') }}">Signup
            </a>
        </div>
    </div>

</div>

@endsection