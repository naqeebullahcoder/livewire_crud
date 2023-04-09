<div>

    @include('livewire.create')
    @include('livewire.update')
    @if(session()->has('message'))
    <div class="alert alert-success" style="margin-top: 30px">
        {{ session('message') }}
    </div>
    @endif
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($users as $user)
                 <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button type="button" wire:click="edit({{ $user->id }})" class="btn btn-primary" data-toggle="modal" data-target="#updateModal" data-whatever="@mdo">Edit
                        </button>
                        <button type="button" wire:click="delete({{ $user->id }})" class="btn btn-danger">Delete</button>
                    </td>
                 </tr>
             @endforeach
        </tbody>
    </table>
</div>
