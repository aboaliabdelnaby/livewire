<x-slot name="title">
    Creating User
</x-slot>
<x-slot name="css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/forms/switches.css') }}">
</x-slot>

<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <form wire:submit.prevent="create">
                <x-form.input type="text" name="name" labelName="Name" key="name"/>
                <x-form.input type="email" name="email" labelName="Email" key="email"/>
                <x-form.input type="password" name="password" labelName="Password" key="password"/>
                <x-form.input type="textarea" name="description" labelName="Description" key="description"/>
                <x-form.box type="select" name="role" labelName="Role" key="role" :elements="$roles"/>
{{--                <x-form.switch  name="status" labelName="Status" key="status" active="1"/>--}}
                <x-form.box type="radio" name="gender" labelName="Gender" key="gender" :elements="$genders"/>
                <x-form.button type="submit" labelName="Add User" class="btn btn-primary"/>
            </form>
        </div>
    </div>
</div>
