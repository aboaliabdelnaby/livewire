<x-slot name="title">
    create User
</x-slot>
<div class="container">
    <form wire:submit.prevent="create">
        <x-form.input type="text" name="name" labelName="Name" key="name"/>
        <x-form.input type="email" name="email" labelName="Email" key="email"/>
        <x-form.input type="password" name="password" labelName="Password" key="password"/>
        <x-form.button type="submit" labelName="Add User" class="btn btn-outline-primary"/>
    </form>
</div>
