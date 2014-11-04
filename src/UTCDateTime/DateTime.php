<?php
/**
 * Copyright (c)2014-2014 heiglandreas
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIBILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @category 
 * @author    Andreas Heigl<andreas@heigl.org>
 * @copyright ©2014-2014 Andreas Heigl
 * @license   http://www.opesource.org/licenses/mit-license.php MIT-License
 * @version   0.0
 * @since     31.10.14
 * @link      https://github.com/heiglandreas/
 */

namespace UTCDateTime;

use \DateTime as DefaultDateTime;
use \DateTimeZone;

class DateTime extends DefaultDateTime
{
    const RFC7231 = 'D, d M Y H:i:s \G\M\T';

    const PDF = 'YmdHis\Z';

    public static $throwOnSetTimezone = true;

    /**
     * @param string       $time
     * @param DateTimeZone $timezone
     *
     * @return void
     */
    public function __construct($time = 'now', DateTimeZone $timezone = null)
    {

        parent::__construct($time, $timezone);
        parent::setTimezone(new DateTimeZone('UTC'));
    }

    /**
     * @param DateTimeZone $timezone
     *
     * @throws \LogicException
     * @return self
     */
    public function setTimezone($timezone)
    {
        if (self::$throwOnSetTimezone) {
            throw new \LogicException('Setting a timezone on a UTCDateTime-object doesn\'t make sense');
        }
        trigger_Error('Setting a timezone on a UTCDateTime-object doesn\'t make sense');
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
     * @return DateTime
     */
    public static function createFromFormat($format, $time, $timezone = null)
    {
        if (! $timezone) {
            $timezone = new DateTimeZone(date_default_timezone_get());
        }

        $dateTimeObject = \DateTime::createFromFormat($format, $time, $timezone);
        $dateTimeObject->setTimezone(new DateTimeZone('UTC'));

        return new self($dateTimeObject->format(\DateTime::RFC2822));
    }

    /**
     * Get a PHP-DateTime-Object from this class for further handling
     *
     * @return \DateTime
     */
    public function getDateTime()
    {
        return new \DateTime($this->format('Y-m-d H:i:s'), new DateTimeZone('UTC'));
    }
}
