<x-slot name="title">
    edit User
</x-slot>
<div class="container">
    <form wire:submit.prevent="update">
        <x-form.input type="text" name="name" labelName="Name" key="name"/>
        <x-form.input type="email" name="email" labelName="Email" key="email"/>
        <x-form.input type="password" name="password" labelName="Password" key="password"/>
        <x-form.button type="submit" labelName="Edit User" class="btn btn-outline-success"/>
    </form>
</div>
