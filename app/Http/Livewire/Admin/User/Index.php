<?php

namespace App\Http\Livewire\Admin\User;

use App\Http\GeneralComponents\GeneralIndex;
use App\Http\Repositories\Admin\UserRepository;

class Index extends GeneralIndex
{
    protected string $module = 'User';
    protected string $parent = 'admin.users';
    protected string $repository = UserRepository::class;
    protected array $columns = ['name', 'email'];

}
