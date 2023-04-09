
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" wire:click.prevent="cancel()" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="user_id">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter Name" wire:model="name" >
                        @error('name')
                            <span class="text-danger error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter Email" wire:model="email">
                        @error('email')
                            <span class="text-danger error">{{ $message }}</span>
                        @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click.prevent="cancel()" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="update()">Udpate</button>
            </div>
        </div>
    </div>
</div>
