<?php

namespace App\Util;

class Roles
{
    public const ROLE_ADMIN = 'ROLE_ADMIN';
    public const ROLE_STUDENT = 'ROLE_STUDENT';

    public const ROLE_PROFESSOR = 'ROLE_PROFESSOR';

    public static function getRoles()
    {
        return [self::ROLE_ADMIN, self::ROLE_PROFESSOR, self::ROLE_STUDENT];
    }
}
