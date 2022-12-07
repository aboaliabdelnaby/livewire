<?php

namespace App\Http\Livewire\Admin\User;

use App\Http\GeneralComponents\Components\Indexing;
use App\Models\User;

class Index extends Indexing
{
    protected string $message = 'User deleted successfully';
    protected string $viewPath = 'admin.users.index';
    protected array $searchColumns = ['name', 'email'];
    protected string $model = User::class;


}
