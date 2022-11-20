<?php

namespace App\Enums\Users;

enum Gender: string
{
    case Male = 'm';
    case Female = 'f';

    public static function genders(): array
    {
        return [Gender::Male->name => Gender::Male->value, Gender::Female->name => Gender::Female->value];

    }
}
