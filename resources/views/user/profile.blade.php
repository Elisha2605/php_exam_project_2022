@extends('layouts.app')

@section('content')
<div class="w-4/5 h-1/3 mt-6 bg-white grid p-10  grid-cols-2 mx-auto text-center divide-x shadow-xl rounded-lg">
    <div class="p-4 text-black ">
        <div class="flex justify-around relative">
            <a class="cursel-pointer top-0 left-0 absolute" href="{{ route('home.show')}}">
                <img src="/svg/back-icon.svg" class="bg-gray-800 rounded-full w-8 h-8 hover:opacity-80 cursor-pointer cursel-pointer inline-block"></img>
                <span class="text-xs">Go back</span>
            </a>
            <img class="block mx-auto rounded-full object-cover h-[230px] w-[230px] shadow-md" src="/uploads/avatars/{{ $user->avatar }}" alt="">
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






<!-- users card component
  <div class="flex flex-wrap gap-5">
  <div class="flex flex-col justify-center items-center w-80 h-auto bg-white p-5 rounded-3xl relative">
      <img class="w-8 h-5 object-fill absolute top-5 right-7" src="https://images.unsplash.com/photo-1555952517-2e8e729e0b44?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80" alt="">
      <img class="block mx-auto rounded-full object-cover h-[200px] w-[200px] shadow-md" src="https://images.unsplash.com/photo-1555952517-2e8e729e0b44?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80" alt="">
      <div class="flex items-center flex-col mt-2">
            <span class="text-4xl">Mathiew</span>
            <span class="text-lg font-extralight">Hernandez</span>
      </div>
      <hr class="my-4 w-52 h-px border-0 dark:bg-gray-300">
      <h2 class="font-bold">Speaks</h2>
      <div class="flex flex-wrap gap-1 mt-2">
        <span class="bg-gray-800 text-xs text-white font-light px-3 py-0.5 rounded-2xl shadow-md">English</span>
        <span class="bg-gray-800 text-xs text-white font-light px-3 py-0.5 rounded-2xl shadow-md">Swahili</span>
        <span class="bg-gray-800 text-xs text-white font-light px-3 py-0.5 rounded-2xl shadow-md">French</span>
        <span class="bg-gray-800 text-xs text-white font-light px-3 py-0.5 rounded-2xl shadow-md">French</span>
      </div>
      <div class="flex flex-col justify-center items-center mt-6">
            <span class="font-medium">Connections</span>
            <span class="text-4xl font-thin">0</span>
      </div>
  </div>
  </div>
 -->