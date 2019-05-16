<?php

declare(strict_types=1);

/**
 * Copyright Andrea Heigl <andreas@heigl.org>
 *
 * Licenses under the MIT-license. For details see the included file LICENSE.md
 */

namespace UTCDateTime;

use \DateTimeImmutable as DefaultDateTimeImmutable;
use \DateTimeZone;

class DateTimeImmutable extends DefaultDateTimeImmutable
{
    const RFC7231 = 'D, d M Y H:i:s \G\M\T';

    const PDF = 'YmdHis\Z';

    use DateTimeBase;

    /**
     * @param string       $time
     * @param DateTimeZone $timezone
     *
     * @return void
     */
    public function __construct($time = 'now', DateTimeZone $timezone = null)
    {
        $utcdate = new DateTime($time, $timezone);
        parent::__construct($utcdate->format('Y-m-d H:i:s'), new DateTimeZone('UTC'));
    }
}
