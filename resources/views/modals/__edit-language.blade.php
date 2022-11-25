<div class="modal fade" id="editLanguage" tabindex="-1" role="dialog" aria-labelledby="editLanguage" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered w-4/5" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="bg-gray-100 border-2 w-full p-2 rounded-lg">
                    Languages
                    <form action="{{ route('profile', auth()->user()->id) }}" method="post">
                    {{method_field('PATCH')}} {{-- @method('PATCH') --}}
                        @csrf
                        <div class="form-group w-full">
                            <!-- <label>Languages</label> -->
                            <select name="languages[] | '' " class="form-control" id="languages" multiple="multiple">
                                @foreach ($all_languages as $key => $value)
                                <option value="{{$key}}">{{ $value }}</option>
                                @endforeach
                            </select>
                            <div>
                            <button type="submit" class="bg-gray-800 text-white px-2 py-1 rounded font-medium w-full">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  