<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <!--  -->
                <form action="{{ route('profile', auth()->user()->id) }}" method="POST">
                    {{method_field('PATCH')}} {{-- @method('PATCH') --}}
                    @csrf
                    <textarea name="bio" id="bio" rows="4" class="block p-2.5 w-full outline-none
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