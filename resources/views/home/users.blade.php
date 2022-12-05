@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="flex flex-wrap gap-5 w-9/12 p-6 rounded-lg mt-3">
        @foreach($users as $user)
        <a href="{{ route('profile.show', $user) }}">
            <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter hover:grayscale-0"> <!-- grayscale-->
                <div class="flex flex-col justify-center items-center w-80 bg-white p-5 rounded-3xl scale-100 hover:scale-105 duration-300 relative">
                    @foreach($user->country as $c)
                    <img class="w-8 h-5 object-fill absolute top-5 right-7" src="/images/flags/{{ $c->code }}.png" alt="">
                    @endforeach
                    <img class="block mx-auto rounded-full object-cover h-[200px] w-[200px] shadow-md" src="/uploads/avatars/{{ $user->avatar }}" alt="">
                    <div class="flex items-center flex-col mt-2">
                        <span class="text-4xl">{{$user->name}}</span>
                        <span class="text-lg font-extralight">{{$user->lastname}}</span>
                    </div>
                    <hr class="my-4 w-52 h-px border-0 dark:bg-gray-300">
                    <h2 class="font-bold mb-2">Speaks</h2>
                    <div class="flex flex-wrap gap-1 mt-2">
                        @foreach($user->languages as $language)
                        <span class="bg-gray-800 text-xs text-white font-light px-3 py-0.5 rounded-2xl shadow-md">{{ $language->name }}</span>
                        @endforeach
                    </div>
                    
                    <div class="flex flex-col justify-center items-center mt-3">
                        <span class="font-medium">Connections</span>
                        <span class="text-4xl font-thin">{{ count(approvedRequests($user)) }}</span>
                    </div>

                    @if($user->connectionStatus(auth()->user()) === 'Pending')
                    <form action="{{ route('connection.request', $user) }}" method="POST">
                        @csrf
                        <button class="bg-yellow-800 text-white font-light w-36 p-1 mt-2 rounded-3xl">{{ $user->connectionStatus(auth()->user()) }}</button>
                    </form>
                    @elseif($user->connectionStatus(auth()->user()) === 'Approve')
                    <form action="{{ route('connection.request', $user) }}" method="POST">
                        @csrf
                        <button class="bg-yellow-800 text-white font-light w-36 p-1 mt-2 rounded-3xl">{{ $user->connectionStatus(auth()->user()) }}</button>
                    </form>
                    @elseif($user->connectionStatus(auth()->user()) === 'Connected')
                    <form action="{{ route('connection.request', $user) }}" method="POST">
                        @csrf
                        <button class="bg-green-800 text-white font-light w-36 p-1 mt-2 rounded-3xl">{{ $user->connectionStatus(auth()->user()) }}</button>
                    </form>
                    @else 
                    <form action="{{ route('connection.request', $user) }}" method="POST">
                        @csrf
                        <button class="bg-gray-800 text-white font-light w-36 p-1 mt-2 rounded-3xl">{{ $user->connectionStatus(auth()->user()) }}</button>
                    </form>
                    @endif
                </div>
            </figure>
        </a>
        @endforeach
    </div>
</div>
@endsection