@extends('layouts.app')

@section('content')
<!-- Modals -->
@include('modals/__update-avatar')
@include('modals/__update-bio')
@include('modals/__update-country')
@include('modals/__update-language')
@include('modals/__update-name')
<!-- EndModals -->
<div class="w-4/5 h-1/3 mt-6 bg-white grid p-10  grid-cols-2 mx-auto text-center divide-x shadow-xl rounded-lg">
    <div class="p-4 text-black relative">
        <a class="cursel-pointer top-0 left-0 absolute" href="{{ route('userProfile', auth()->user()->id) }}">
            <img src="/svg/back-icon.svg" class="bg-gray-800 rounded-full w-8 h-8 hover:opacity-80 cursor-pointer cursel-pointer inline-block"></img>
            <span class="text-xs">Go back</span>
        </a>
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
            @if($user == auth()->user())
            <div class="hover:opacity-80 cursor-pointer" data-toggle="modal" data-target="#updateName">
                <img class="w-5 h-5 inline-block" src="/svg/edit-icon.svg" alt="">
                <span class="text-xs">Edit name</span>
            </div>
            @endif
        </div>
        <div class="flex justify-center flex-col mt-6">
            <span class="font-medium">Connections</span>
            <span class="text-4xl font-thin">0</span>
        </div>
    </div>
    <div class="flex flex-col gap-3 p-4 text-black text-left">
        <h2 class="text-4xl">Bio</h2>
        @if($user->bio == 0 && $user == auth()->user())
        <div class="flex flex-col justify-center items-center hover:opacity-80 cursor-pointer">
            <div href="" data-toggle="modal" data-target="#updateBio">
                <img class="w-10 h-10" src="/svg/add.png" alt="">
            </div>
            <span class="text-xs">Add bio</span>
        </div>
        @else
        <div class="font-Inter">
            {{$user->bio}}
            @if($user == auth()->user())
            <div class="hover:opacity-80 cursor-pointer mt-2" href="" data-toggle="modal" data-target="#updateBio">
                <img class="w-5 h-5 inline-block" src="/svg/edit-icon.svg" alt="">
                <span class="text-xs">Edit bio</span>
            </div>
            @endif
        </div>
        @endif
        <hr>
        <div class="flex flex-col gap-3 relative">
            <h3 class="text-xl font-light">Country</h3>
            <div>
                @foreach($user->country as $c)
                <img class="w-8 h-5 object-fill inline-block" src="/images/flags/{{ $c->code }}.png" alt="">
                <span class="text-sm font-extralight ml-1">{{ $c->name }}</span>
                @endforeach
            </div>
            @if($user->id == auth()->user()->id)
            <div class="hover:opacity-80 cursor-pointer" data-toggle="modal" data-target="#updateCountry">
                <img class="w-5 h-5 inline-block" src="/svg/edit-icon.svg" alt="">
                <span class="text-xs">Edit country</span>
            </div>
            @endif
            <hr>
            <h3 class="text-xl font-light">Languages</h3>
            <div class="flex flex-wrap gap-2 w-full">
                @foreach($user->languages as $language)
                <form action="{{ route('deleteLanguage', $user->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input name="{{$language->id}}" type="submit" class="bg-gray-800 text-sm 
                                text-white font-light px-3 py-1 
                                rounded-2xl shadow-md relative 
                                cursor-pointer hover:bg-red-600" value="{{ $language->name }}&emsp;&emsp;&emsp; x" />
                </form>
                @endforeach
            </div>
            @if($user->id == auth()->user()->id)
            <div class="hover:opacity-80 cursor-pointer" data-toggle="modal" data-target="#editLanguage">
                <img class="w-5 h-5 inline-block" src="/svg/add.png" alt="">
                <span class="text-xs">Add language</span>
            </div>
            @endif
            <a class="cursel-pointer" href="{{ route('userProfile', auth()->user()->id) }}">
                <a onclick="return confirm('Are you sure you want to delete your account?')" href="{{ route('deleteAccount', auth()->user()->id) }}" class="flex flex-row bg-red-800 rounded-full w-8 h-8 hover:opacity-80 cursor-pointer cursel-pointer">
                    <img src="/svg/delete-icon.svg"></img>
                    <div class="flex flex-col pl-2 items-center">
                        <span class="text-xs text-red-600">Delete</span>
                        <span class="text-xs text-red-600">(account)</span>
                    </div>
                </a>
            </a>
        </div>
    </div>
</div>

@endsection