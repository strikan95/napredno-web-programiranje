<?php

namespace App\Util;

class StudyType
{
    public const PROFESSIONAL = 'STUDY_PROFESSIONAL';
    public const UNDERGRADUATE = 'STUDY_UNDERGRADUATE';

    public const GRADUATE = 'STUDY_GRADUATE';

    public static function getStudyTypes()
    {
        return [self::PROFESSIONAL, self::UNDERGRADUATE, self::GRADUATE];
    }
}
