@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg mt-3">
        @if (session('status'))
        <div class="bg-red-400 p-4 rounded-lg mb-6 text-white text-center text-sm">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 class="text-5xl mb-4 text-center font-thin">Login</h1>
            <div class="mb-4">
                <label for="email" class="sr-only">E-mail</label>
                <input type="email" name="email" id="email" placeholder="E-mail" class="bg-gray-100 border-2 w-full p-2 rounded-lg
                            @error('email') border-red-500 @enderror" value="{{ old('email') }}" />
                @error('email')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="" name="password" id="name" placeholder="Password" class="bg-gray-100 border-2 w-full p-2 rounded-lg
                            @error('password') border-red-500 @enderror" value="{{ old('') }}" />
                @error('password')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remeber" class="mr-2" />
                    <label for="remeber">Remeber me</label>
                </div>
            </div>
            <div>
                <button type="submit" class="bg-gray-800 text-white text-2xl px-2 py-3 rounded font-thin w-full ">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection