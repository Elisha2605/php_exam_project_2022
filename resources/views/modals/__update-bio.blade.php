<div class="modal fade" id="updateBio" tabindex="-1" role="dialog" aria-labelledby="updateBio" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered w-4/5" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <!--  -->
                <h1 class="text-4xl mb-2">Edit Bio</h1>
                <form action="{{ route('updateBio', $user->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <textarea value="hello" name="bio" id="bio" rows="10" class="block p-2.5 w-full outline-none 
                                    text-lg text-gray-900 bg-gray-50 
                                    rounded-lg border border-gray-300 
                                    focus:ring-blue-500 focus:border-blue-500 
                                    dark:bg-gray-100 dark:border-gray-600 
                                    dark:placeholder-gray-400 dark:text-black 
                                    dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write about yourself...">{{ $user->bio }}</textarea>
                    <div class="mt-2">
                        <button 
                                type="submit" 
                                class="bg-gray-800 text-white px-2 py-1 rounded font-medium w-full"
                                >Submit
                        </button>
                    </div>
                </form>
                <!--  -->
            </div>
        </div>
    </div>
</div>