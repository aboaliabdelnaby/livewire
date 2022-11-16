<?php

namespace App\Http\Validation\Users;

use App\Http\Validation\Validation;

class Update implements Validation
{

    public static function rules($model=null): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $model->id],
            'password' => ['nullable', 'string', 'min:8'],
        ];
    }
}
