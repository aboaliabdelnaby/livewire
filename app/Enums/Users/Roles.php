<?php

namespace App\Enums\Users;

enum Roles: string
{
    case Admin = 'admin';
    case User = 'user';

    public static function roles(): array
    {
        return [self::Admin->name => self::Admin->value, self::User->name => self::User->value];
    }

}
