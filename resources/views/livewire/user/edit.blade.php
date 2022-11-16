<x-slot name="title">
    edit User
</x-slot>
<div class="container">
    <form wire:submit.prevent="update">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" wire:model="name" id="name" placeholder="Enter Name">
            @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>

            <input type="email" class="form-control" wire:model="email" id="email" placeholder="Enter Email">
            @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>

            <input type="password" class="form-control" wire:model="password" id="password" placeholder="Enter Password">
            @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-outline-primary">edit User</button>
    </form>
</div>
