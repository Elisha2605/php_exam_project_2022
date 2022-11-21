@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg mt-3">
        Country
        <form action="{{ route('country') }}" method="post">
            @csrf
            <div class="form-group">
                <!-- <label>Country</label> -->
                <select name="contries[]" class="form-control" id="countries" multiple="multiple">
                    @foreach ($all_countries as $key => $value)
                    <option value="{{$key}}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded
                    fotn-medium w-full">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection