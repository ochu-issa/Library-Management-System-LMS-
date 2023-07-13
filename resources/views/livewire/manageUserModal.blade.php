<!-- Edit User Modal -->
<div wire:ignore.self class="modal fade" id="edituser" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update User</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updateUser">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Full Name</label>
                            <input type="text" wire:model="full_name" class="form-control"
                                placeholder="Enter full name">
                            @error('full_name')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="">Email</label>
                            <input type="email" wire:model="email" class="form-control"
                                placeholder="Enter email address.">
                            @error('email')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="">Password</label>
                           <input type="password" wire:model="password" class="form-control" placeholder="change password">
                            @error('password')
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


<!-- Delete - Modal -->
<div wire:ignore.self class="modal fade" id="deleteuser" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLongTitle">Delete User</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="destroyUser">
                    <div class="row">
                        <p>Are you sure you want to delete the user?</p>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger btn-primary">Yes! Delete it</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- end of modal --}}
