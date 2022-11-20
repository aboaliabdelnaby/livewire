<x-slot name="title">
    users
</x-slot>

<div class="container">
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="float-right mt-5">
                <x-table.link
                    href="{{route('users.create')}}"
                    class="btn btn-md btn-outline-success"
                    labelName="Create User"/>
            </div>
            <x-form.search  name="search" labelName="Users..."/>

        </div>
    </div>

    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <x-table.th  name="name" labelName="Name"/>
                <x-table.th  name="email" labelName="Email"/>
                <x-table.th  name="created_at" labelName="Created at"/>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($data as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('m-d-Y') }}</td>

                    <td>
                        <x-table.link
                            href="{{route('users.edit',$user->id)}}"
                            class="btn btn-md btn-dark"
                            labelName="Edit"/>
                    </td>
                    <td>
                        @if($user->id!=auth()->id())
                            <x-table.fire-event
                                labelName="Delete"
                                class="btn btn-md btn-danger"
                                emit="$emit('deleting', {{ $user->id }}, 'user')"
                            />

                        @endif
                    </td>
                </tr>
            @empty
                <x-table.empty />
            @endforelse
            </tbody>
        </table>

    </div>
    <x-table.paginate :data="$data" />
</div>
