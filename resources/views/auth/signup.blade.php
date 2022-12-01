@extends('layouts.app')

@section('content')
   <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg mt-3">
            <form action="{{ route('signup') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h1 class="text-5xl mb-4 text-center font-thin">Signup</h1>
                <div class="mb-4">
                    <label for="name" class="sr-only">Your name</label>
                    <input type="text" name="name" id="name" placeholder="First name" 
                            class="bg-gray-100 border-2 w-full p-2 rounded-lg
                            @error('lastname') border-red-500 @enderror"
                            value="{{ old('name') }}" 
                    />
                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="lastname" class="sr-only">Last name</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Last name" 
                            class="bg-gray-100 border-2 w-full p-2 rounded-lg
                            @error('lastname') border-red-500 @enderror" 
                            value="{{ old('lastname') }}" 
                    />
                    @error('lastname')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="sr-only">E-mail</label>
                    <input type="email" name="email" id="email" placeholder="E-mail" 
                            class="bg-gray-100 border-2 w-full p-2 rounded-lg
                            @error('email') border-red-500 @enderror" 
                            value="{{ old('email') }}" 
                    />
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="" name="password" id="name" placeholder="Password" 
                            class="bg-gray-100 border-2 w-full p-2 rounded-lg
                            @error('password') border-red-500 @enderror" 
                            value="{{ old('') }}" 
                    />
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Confirm password</label>
                    <input type="" name="password_confirmation" id="password_confirmation" placeholder="Confirm passwor" 
                            class="bg-gray-100 border-2 w-full p-2 rounded-lg
                            @error('password_confirmation') border-red-500 @enderror" 
                            value="{{ old('') }}" 
                    />
                    @error('password_confirmation')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="date_of_birth" class="sr-only">Country</label>
                    <select name="country" 
                            class="bg-gray-100 border-2 w-full p-2 rounded-lg
                            @error('country') border-red-500 @enderror" id="country">
                        @foreach ($all_countries as $key => $value)
                        <option class="" value="" selected disabled hidden>-- Select Country --</option>
                        <option value="{{$key}}">{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('country')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="date_of_birth" class="sr-only">Date of birth</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" 
                            class="bg-gray-100 border-2 w-full p-2 rounded-lg
                            @error('date_of_bith') border-red-500 @enderror" 
                            value="{{ old('date_of_bith') }}" 
                    />
                    @error('date_of_bith')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="file" name="avatar" id="avatar" 
                            class="bg-gray-100 border-2 w-full p-2 rounded-lg
                            @error('avatar') border-red-500 @enderror" 
                            value="{{ old('avatar') }}" 
                    />
                    @error('avatar')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-gray-800 text-white text-2xl px-2 py-3 rounded font-thin w-full">Signup</button>
                </div>
            </form>
        </div>
   </div>
@endsection