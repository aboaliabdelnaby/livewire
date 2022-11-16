<x-slot name="title">
    users
</x-slot>

<div class="container">
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="float-right mt-5">
                <a class="btn btn-md btn-outline-success" href="{{route('users.create')}}">
                    Create
                </a>
            </div>
            <div class="float-right mt-5">
                <input wire:model="search" class="form-control" type="text" placeholder="Search Users...">
            </div>
        </div>
    </div>

    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th>
                    <a wire:click.prevent="sortBy('name')" role="button">
                        Name
                        <i class="fa fa-sort"></i>
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('email')" role="button">
                        Email
                        <i class="fa fa-sort"></i>
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('created_at')" role="button">
                        Created at
                        <i class="fa fa-sort"></i>
                    </a>
                </th>

                <th>
                    Edit
                </th>
                <th>
                    Delete
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('m-d-Y') }}</td>

                    <td>
                        <a class="btn btn-md btn-dark" href="{{route('users.edit',$user->id)}}">
                            Edit
                        </a>
                    </td>
                    <td>
                        @if($user->id!=auth()->id())
                            <button class="btn btn-md btn-danger"
                                    wire:click="$emit('deleting', {{ $user->id }}, 'user')">
                                Delete
                            </button>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100%">
                        <div class="alert alert-warning">
                            no result .
                        </div>
                    </td>
                </tr>

            @endforelse
            </tbody>
        </table>

    </div>

    <div class="row">
        <div class="col">
            {{ $users->links() }}
        </div>
    </div>
</div>
