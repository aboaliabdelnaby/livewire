<x-slot name="title">
    Creating User
</x-slot>
<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <form wire:submit.prevent="create">
                <x-form.input type="text" name="name" labelName="Name" key="name"/>
                <x-form.input type="email" name="email" labelName="Email" key="email"/>
                <x-form.input type="password" name="password" labelName="Password" key="password"/>
                <x-form.button type="submit" labelName="Add User" class="btn btn-primary"/>
            </form>
        </div>
    </div>
</div>
