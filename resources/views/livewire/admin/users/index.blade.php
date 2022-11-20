<x-slot name="title">
    Users
</x-slot>


<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="float-left mt-4">
                <x-table.link
                    href="{{route('admin.users.create')}}"
                    class="btn btn-primary"
                    icon="plus"/>
            </div>
            <div class="float-right m-4">
                <x-form.search  name="search" labelName="Users..."/>
            </div>
            <table id="zero-config" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <x-table.th  name="name" labelName="Name"/>
                    <x-table.th  name="email" labelName="Email"/>
                    <x-table.th  name="role" labelName="Role"/>
                    <x-table.th  name="gender" labelName="Gender"/>
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
                        <td>{{ $user->role->name }}</td>
                        <td>{{ $user->gender->name }}</td>
                        <td>{{ $user->created_at->format('m-d-Y') }}</td>
                        <td>
                            <x-table.link
                                href="{{route('admin.users.edit',$user->id)}}"
                                class="btn btn-success"
                                icon="edit"/>
                        </td>
                        <td>
                            @if($user->id!=auth()->id())
                                <x-form.button
                                    type="button"
                                    icon="trash"
                                    class="btn btn-danger"
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
            <x-table.paginate :data="$data" />
        </div>

    </div>

</div>


<x-slot name="js">
    <script src="{{asset('admin/plugins/table/datatable/datatables.js')}}"></script>
</x-slot>









