@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg mt-3">
        Languages
        <form action="{{ route('language') }}" method="post">
            @csrf
            <div class="form-group w-1/2">
                <!-- <label>Languages</label> -->
                <select name="languages[]" class="form-control" id="languages" multiple="multiple">
                    @foreach ($all_languages as $key => $value)
                    <option value="{{$key}}">{{ $value }}</option>
                    @endforeach
                </select>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded
                        fotn-medium w-full">Submit</button>
                </div>
            </div>
        </form>
        {{ $user->name }}
        @foreach($languages as $lang)
            <li>{{ $lang->name }}
        @endforeach
    </div>
    <form action="{{ route('language') }}" method="post">
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
</div>
@endsection