@extends('layouts.app')
@section('content')



<div class="flex flex-col mx-auto justify-center items-center">
  @if(count($pending_requests) > 0)
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 w-1/2 pt-4 bg-white mt-8 rounded-lg">
    <table class="w-full">
      <tbody>
        <h1 class="text-2xl font-normal mb-3 text-center">Pending requests</h1>
        @foreach($pending_requests as $request)
        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
          <td class="flex items-center gap-3 px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
            <img class="w-14 h-14 object-cover rounded-full" src="/uploads/avatars/{{ $request->avatar }}" alt="Neil image">
            <div class="flex flex-col">
              <span class="text-sm text-gray-900 font-light">{{ $request->name }} {{ $request->lastname }}</span>
              <span class="text-sm text-gray-900 font-light">{{\Carbon\Carbon::parse($request->created_at)->diffForHumans()}}</span>
            </div>
          </td>
          <td class="py-4 ">
            <div class="flex justify-end mr-3 gap-3">
              <form action="{{ route('connection.store', $request->user_from) }}" method="POST">
                @csrf
                <button type="submit" class="hover:bg-green-200 p-1 rounded-full text-sm text-black font-light w-24 hover:opacity-80 cursor-pointer cursel-pointer flex flex-row justify-center items-center gap-1 ">
                        <img class="w-3" src="/svg/tick-icon.svg"></img>
                        Approve
                </button>
              </form>
              <form action="{{ route('connection.distroy', $request->user_from) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure you want to delete user: {{ $request->name }} ?')" 
                        class="hover:bg-red-200 p-1 rounded-full text-sm text-black font-light w-24 hover:opacity-80 cursor-pointer cursel-pointer flex flex-row justify-center items-center gap-1">
                        <img class="w-3" src="/svg/trashcan.svg"></img>
                        Discard
                </button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @else
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 w-1/2 pt-4 bg-white mt-8 rounded-lg">
    <h1 class="text-2xl font-thin mb-3 text-center">No pending requests</h1>
  </div>
  <br>
  @endif
  @if(count($approved_requests) > 0)
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 w-1/2 pt-4 bg-white">
    <table class="w-full">
      <tbody>
        <h1 class="text-2xl font-normal text-center">My connections</h1>
        @foreach($approved_requests as $request)
        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
          <td class="flex items-center gap-3 px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
            <img class="w-14 h-14 object-cover rounded-full" src="/uploads/avatars/{{ $request->avatar }}" alt="Neil image">
            <div class="flex flex-col">
              <span class="text-sm text-gray-900 font-light">{{ $request->name }} {{ $request->lastname }}</span>
              <span class="text-sm text-gray-900 font-light">{{\Carbon\Carbon::parse($request->created_at)->diffForHumans()}}</span>
            </div>
          </td>
          <td class=" py-4 whitespace-nowrap">
            <form action="{{ route('connection.distroy', $request->user_from) }}" method="POST" class="flex justify-end mr-3">
              @csrf
              @method('DELETE')
              <form action="" method="POST">
                @csrf
                <button type="submit" onclick="return confirm('Are you sure you want to delete user: {{ $request->name }} ?')" 
                        class="hover:bg-red-200 p-1 rounded-full text-sm text-black font-light w-24 hover:opacity-80 cursor-pointer cursel-pointer flex flex-row justify-center items-center gap-1">
                        <img class="w-3" src="/svg/trashcan.svg"></img>
                        Discard
                </button>
              </form>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @endif

</div>


@endsection