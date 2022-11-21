<?php

namespace App\Http\Validation\Admin\Users;

use App\Enums\Users\Gender;
use App\Enums\Users\Roles;
use App\Http\Validation\Validation;
use Illuminate\Validation\Rules\Enum;

class Update implements Validation
{

    public static function rules($model=null): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $model->id],
            'password' => ['nullable', 'string', 'min:8'],
            'description' => ['nullable', 'string', 'max:500'],
            'role' => ['required', new Enum(Roles::class)],
            'gender' => ['required', new Enum(Gender::class)],
            'photo' => ['nullable','image','max:1024'], // 1MB Max
        ];
    }
}
