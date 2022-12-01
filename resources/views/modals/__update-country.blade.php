<div class="modal fade" id="updateCountry" tabindex="-1" role="dialog" aria-labelledby="updateCountry" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered w-4/5" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="bg-gray-100 border-2 w-full p-2 rounded-lg">
                    Languages
                    <form action="{{ route('profile.update.country', auth()->user()) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="mb-4">
                            <label for="date_of_birth" class="sr-only">Country</label>
                            <select name="country" class="bg-gray-100 border-2 w-full p-2 rounded-lg
                            @error('country') border-red-500 @enderror" id="country">
                                @foreach ($countries as $country)
                                <option class="" value="" selected disabled hidden>-- Select Country --</option>
                                <option value="{{$country->code}}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('country')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="bg-gray-800 text-white px-2 py-1 rounded font-medium w-full">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>