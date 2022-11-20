<?php

namespace App\Http\Livewire\User;

use App\Http\GeneralComponents\GeneralCreate;
use App\Http\Validation\Users\Store;
use App\Models\User;

class Create extends GeneralCreate
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    protected string $model = User::class;
    protected string $module = 'User';
    protected string $store = Store::class;

}
