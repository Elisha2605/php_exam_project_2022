@extends('layouts.app')

@section('content')
<div class="w-4/5 h-1/3 mt-6 bg-white grid p-20  grid-cols-2 mx-auto text-center divide-x shadow-xl">
    <div class="p-4 text-black ">
        <div class="flex justify-around relative">
            <img class="block mx-auto rounded-full object-cover h-[230px] w-[230px] shadow-xl" src="/uploads/avatars/{{ $user->avatar }}" alt="">
            <div class="flex justify-center rounded-br-full rounded-bl-full h-28 w-[230px] 
                    absolute bottom-0 items-center opacity-0 hover:opacity-40 hover:bg-black 
                    duration-200 text-white text-2xl cursor-pointer">
                Edit profile
            </div>
            <img src="/svg/photo.png" class="bg-gray-800 w-12 h-12 rounded-full absolute bottom-0 ml-32 hover:opacity-80 cursor-pointer"></img>
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
        @if($user->bio == 0)
        <div class="flex justify-center items-center hover:opacity-80 cursor-pointer">
            <div href="" data-toggle="modal" data-target="#exampleModalCenter">
                <img class="w-10 h-10" src="/svg/add.png" alt="">
            </div>
        </div>
        @else
        <p class="font-Inter">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis error
            obcaecati corrupti, ab aliquam consequatur iure cum. Adipisci perspiciatis
            obcaecati officiis incidunt iure facilis, ipsum voluptates maiores aperiam a aliquam!
            Corporis error
            obcaecati corrupti, ab aliquam consequatur iure cum. Adipisci perspiciatis
            obcaecati officiis incidunt iure facilis, ipsum voluptates maiores aperiam a aliquam!
        </p>
        @endif

        <!--  -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <!--  -->
                        <form action="{{ route('profile') }}" method="post">
                            @csrf
                            <textarea 
                                    name="bio"
                                    id="message" 
                                    rows="4" 
                                    class="block p-2.5 w-full outline-none
                                    text-lg text-gray-900 bg-gray-50 
                                    rounded-lg border border-gray-300 
                                    focus:ring-blue-500 focus:border-blue-500 
                                    dark:bg-gray-100 dark:border-gray-600 
                                    dark:placeholder-gray-400 dark:text-black 
                                    dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write about yourself..."></textarea>
                            <div class="mt-2">
                                <button type="submit" class="bg-gray-800 text-white px-2 py-1 rounded font-medium w-full">Submit</button>
                            </div>     
                        </form>
                        <!--  -->
                    </div>
                </div>
            </div>
        </div>
        <!--  -->

        <hr>
        <div class="flex flex-col gap-3">
            <h3 class="text-xl font-light">Country</h3>
            <div>
                @foreach($country as $c)
                <img class="w-8 h-5 object-fill inline-block" src="/images/flags/{{ $c->code }}.png" alt="">
                <span class="text-sm font-extralight ml-1">{{ $c->name }}</span>
                @endforeach
            </div>
            <h3 class="text-xl font-light">Languages</h3>
            <div class="flex flex-wrap gap-2 w-full">
                @foreach($languages as $language)
                <span class="bg-gray-800 text-sm text-white font-light px-5 py-1 rounded-2xl shadow-md">{{ $language->name }}</span>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection