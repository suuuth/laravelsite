<?php

namespace App\Libraries\Traits;

use Datetime;
use Exception;

trait PropertyCasts
{

    /**
     * @param string $datetime
     * @return Datetime
     * @throws Exception
     */
    public static function stringToDateTime(string $datetime): DateTime
    {
        return new DateTime($datetime);
    }

    /**
     * @param Datetime $datetime
     * @return string
     */
    public static function dateTimeToStringFormatted(DateTime $datetime): string
    {
        return $datetime->format('T');
    }

    /**
     * @param Datetime $datetime
     * @return int
     */
    public static function dateTimeToUnix(DateTime $datetime): int
    {
        return $datetime->format('U');
    }
}
