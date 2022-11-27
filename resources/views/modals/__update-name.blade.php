<div class="modal fade" id="updateName" tabindex="-1" role="dialog" aria-labelledby="updateName" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered w-96" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <!--  -->
                <h1 class="text-4xl mb-2">Edit Name</h1>
                <form action="{{ route('updateName', $user->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="mb-2">
                        <label for="name" class="sr-only">Your name</label>
                        <input type="text" name="name" id="name" placeholder="First name" class="bg-gray-100 border-2 w-full p-2 rounded-lg
                            @error('lastname') border-red-500 @enderror" value="{{ $user->name }}" />
                        @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="lastname" class="sr-only">Last name</label>
                        <input type="text" name="lastname" id="lastname" placeholder="Last name" class="bg-gray-100 border-2 w-full p-2 rounded-lg
                            @error('lastname') border-red-500 @enderror" value="{{ $user->lastname }}" />
                        @error('lastname')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="bg-gray-800 text-white px-2 py-1 rounded font-medium w-full">Submit</button>
                    </div>
                </form>
                <!--  -->
            </div>
        </div>
    </div>
</div>