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
</div>
@endsection