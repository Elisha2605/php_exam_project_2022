@extends('layouts.app')

@section('content')
<div class="w-full h-full bg-gradient-to-r from-sky-500 to-indigo-500 absolute">
    <div class="flex flex-col w-3/5 mx-auto">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-white border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    User
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Email
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Signed up date
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    ID
                                </th>
                                <th scope="col" class="text-sm font-medium text-red-700 px-6 py-4 text-left">
                                    Delete
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($users->count())
                            @foreach($users as $user)
                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                <td class="flex items-center gap-3 px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <a class="flex flex-row items-center gap-1" href="{{ route('profile.show', $user->name) }}">
                                    <img class="w-12 h-12 object-cover rounded-full" src="/uploads/avatars/{{ $user->avatar }}" alt="Neil image">
                                </a>
                                    <span class="text-sm text-gray-900 font-light">{{ $user->name }} {{ $user->lastname }}</span>
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $user->email }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $user->created_at->format('d-m-Y') }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $user->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('admin.destroy', $user) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete user: {{ $user->name }} ?')" class="flex flex-row rounded-full w-4 h-4 hover:opacity-80 cursor-pointer cursel-pointer ml-3">
                                            <img src="/svg/trashcan.svg"></img>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <p>No users yet</p>
                            @endif
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection