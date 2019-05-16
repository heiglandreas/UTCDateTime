<?php

declare(strict_types=1);

/**
 * Copyright Andrea Heigl <andreas@heigl.org>
 *
 * Licenses under the MIT-license. For details see the included file LICENSE.md
 */

namespace UTCDateTime;

use function date_default_timezone_get;
use DateTimeZone;
use function trigger_error;

trait DateTimeBase
{
    /**
     * @param DateTimeZone $timezone
     *
     * @return self
     */
    public function setTimezone($timezone)
    {
        trigger_error('Setting a timezone on a UTCDateTime-object doesn\'t make sense');

        return $this;
    }

    /**
     * Parse a string into a new DateTime object according to the specified format
     *
     * @param string $format Format accepted by date().
     * @param string $time String representing the time.
     * @param DateTimeZone $timezone A DateTimeZone object representing the desired time zone.
     *
     * @link http://php.net/manual/en/datetime.createfromformat.php
     * @return self
     */
    public static function createFromFormat($format, $time, DateTimeZone $timezone = null) : self
    {
        if (! $timezone) {
            $timezone = new DateTimeZone(date_default_timezone_get());
        }

        $dateTimeObject = \DateTimeImmutable::createFromFormat($format, $time, $timezone);
        $dateTimeObject->setTimezone(new DateTimeZone('UTC'));

        return new self($dateTimeObject->format(\DateTime::RFC2822));
    }
}