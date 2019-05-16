<?php

declare(strict_types=1);

/**
 * Copyright Andrea Heigl <andreas@heigl.org>
 *
 * Licenses under the MIT-license. For details see the included file LICENSE.md
 */

namespace UTCDateTime;

use \DateTime as DefaultDateTime;
use \DateTimeZone;

class DateTime extends DefaultDateTime
{
    const RFC7231 = 'D, d M Y H:i:s \G\M\T';

    const PDF = 'YmdHis\Z';

    use DateTimeBase;

    public function __construct($time = 'now', DateTimeZone $timezone = null)
    {
        parent::__construct($time, $timezone);
        parent::setTimezone(new DateTimeZone('UTC'));
    }
}
