<?php

namespace App\Http\Livewire\User;

use App\Http\GeneralComponents\GeneralIndex;
use App\Models\User;

class Index extends GeneralIndex
{
    protected string $model = User::class;
    protected string $module = 'User';


}
