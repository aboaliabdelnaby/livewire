<?php

namespace App\Http\Livewire\Admin\User;

use App\Http\GeneralComponents\GeneralIndex;
use App\Models\User;

class Index extends GeneralIndex
{
    protected string $model = User::class;
    protected string $module = 'User';
    protected string $parent = 'admin.users';



}
