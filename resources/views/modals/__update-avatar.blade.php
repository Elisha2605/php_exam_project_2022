<div class="modal fade" id="editAvatar" tabindex="-1" role="dialog" aria-labelledby="editAvatar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered w-4/5" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('updateAvatar', $user->id) }}" method="POST" enctype="multipart/form-data">
                    {{method_field('PATCH')}} {{-- @method('PATCH') --}}
                    @csrf
                    <h1 class="text-3xl mb-2">Edit image</h1>
                    <div class="mb-4">
                        <input type="file" name="avatar" id="avatar" class="bg-gray-100 border-2 w-full p-2 rounded-lg
                            @error('avatar') border-red-500 @enderror" value="{{ old('avatar') }}" />
                        @error('avatar')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="bg-gray-800 text-white px-2 py-1 rounded font-medium w-full">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>