@extends('layouts.app')

@section('content')
<div class="w-4/5 h-1/3 mt-6 bg-white grid p-10  grid-cols-2 mx-auto text-center divide-x shadow-xl rounded-lg">
    <div class="p-4 text-black ">
        <div class="flex justify-around relative">
            <img class="block mx-auto rounded-full object-cover h-[230px] w-[230px] shadow-md" src="/uploads/avatars/{{ $user->avatar }}" alt="">
            <div data-toggle="modal" data-target="#editAvatar" class="flex justify-center rounded-br-full rounded-bl-full h-28 w-[230px] 
                        absolute bottom-0 items-center opacity-0 hover:opacity-40 hover:bg-black 
                      text-white text-2xl cursor-pointer">
                Edit image
                <img src="/svg/photo.png" class="bg-gray-800 w-12 h-12 rounded-full absolute bottom-0 ml-32 hover:opacity-80 cursor-pointer"></img>
            </div>
        </div>
        <div class="flex justify-center flex-col mt-2">
            <span class="text-4xl">{{ $user->name }}</span>
            <span class="text-2xl font-extralight">{{ $user->lastname }}</span>
        </div>
        <div class="flex justify-center flex-col mt-6">
            <span class="font-medium">Connections</span>
            <span class="text-4xl font-thin">0</span>
        </div>
    </div>
    <div class="flex flex-col gap-3 p-4 text-black text-left">
        <h2 class="text-4xl">Bio</h2>
        <div class="font-Inter">
            {{$user->bio}}
        </div>
        <hr>
        <div class="flex flex-col gap-3">
            <h3 class="text-xl font-light">Country</h3>
            <div>
                @foreach($user->country as $c)
                <img class="w-8 h-5 object-fill inline-block" src="/images/flags/{{ $c->code }}.png" alt="">
                <span class="text-sm font-extralight ml-1">{{ $c->name }}</span>
                @endforeach
            </div>
            <hr>
            <h3 class="text-xl font-light">Languages</h3>
            <div class="flex flex-wrap gap-2 w-full">
                @foreach($user->languages as $language)
                <span class="bg-gray-800 text-sm text-white font-light px-5 py-1 rounded-2xl shadow-md">{{ $language->name }}</span>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection