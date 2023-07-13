<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addbook" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Book</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="storeBook">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="Enter Subject Name...">Book Title</label>
                            <input type="text" wire:model="booktitle" class="form-control"
                                placeholder="Enter book title...">
                            @error('booktitle')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="Enter Subject Name...">Book Author</label>
                            <input type="text" wire:model="bookauthor" class="form-control"
                                placeholder="Enter book Author...">
                            @error('bookauthor')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="Enter Subject Name...">Description</label>
                            <textarea wire:model="description" i cols="30" rows="5" class="form-control"></textarea>
                            @error('description')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="Enter Subject Name...">Choose Type</label>
                            <select wire:model="booktype" class="form-control">
                                <option value="disabled" selected disabled>--Choose Book Type--</option>
                                <option value="Art/Architecture">Art/Architecture</option>
                                <option value="Novel">Novel</option>
                                <option value="Historical Fictions">Historical Fictions</option>
                                <option value="Horror">Horror</option>
                                <option value="Crime">Crime</option>
                                <option value="Classic">Classic</option>
                                <option value="Science">Science</option>
                                <option value="Plays">Plays</option>
                                <option value="Mystery">Mystery</option>
                            </select>
                            @error('booktype')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- end of modal --}}
