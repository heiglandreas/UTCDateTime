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

namespace UTCDateTimeTest;

use UTCDateTime\DateTime;

class DateTimeTest extends \PHPUnit_Framework_TestCase
{
    public function testCreationOfUTCDateTime()
    {
        $test = new DateTime('2013-12-14 12:34:45+02:00');

        $this->assertEquals('2013-12-14T10:34:45+00:00', $test->format(DATE_RFC3339));
    }

    public function testExistenceOfClassConstants()
    {
        $ReflectObject = new \ReflectionClass('\UTCDateTime\DateTime');
        $this->assertTrue($ReflectObject->hasConstant('RFC3339'));
        $this->assertTrue($ReflectObject->hasConstant('RFC7231'));
        $this->assertTrue($ReflectObject->hasConstant('PDF'));
    }

    public function testFormatingOfRFC7231()
    {
        $test = new DateTime('2013-12-14 12:34:45+02:00');

        $this->assertEquals('Sat, 14 Dec 2013 10:34:45 GMT', $test->format(DateTime::RFC7231));

        $test = new DateTime('2013-06-14 12:34:45', new \DateTimeZone('Europe/Berlin'));
        $this->assertEquals('Fri, 14 Jun 2013 10:34:45 GMT', $test->format(DateTime::RFC7231));
    }

    public function testFormatingOfPDFTime()
    {
        $test = new DateTime('2013-12-14 12:34:45+02:00');

        $this->assertEquals('20131214103445Z', $test->format(DateTime::PDF));

        $test = new DateTime('2013-06-14 12:34:45', new \DateTimeZone('Europe/Berlin'));
        $this->assertEquals('20130614103445Z', $test->format(DateTime::PDF));
    }

    public function testSettingTimezoneDoesNothing()
    {
        $test = new DateTime();

        $this->assertSame($test, @$test->setTimeZone(new \DateTimeZone('Europe/Berlin')));
        $this->assertEquals(new \DateTimeZone('UTC'), $test->getTimezone());
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Notice
     */
    public function testSettingTimezoneTRiggersError()
    {
        $test = new DateTime();

        $this->assertSame($test, $test->setTimeZone(new \DateTimeZone('Europe/Berlin')));
    }

    public function testGettingDateTimeFromFormatString()
    {
        $this->markTest Skipped('Check why createFromFormat calls setTimezone in UTCDateTime');
        $test = DateTime::createFromFormat(DateTime::RFC3339, '2013-12-14 12:34:45+02:00', new \DateTimeZone('UTC'));

        $this->assertinstanceof('\UTCDateTime\DateTime', $test);
        $this->assertEquals('2013-12-14 10:34:45+02:00', $test->format(DateTime::RFC3339));
    }

}
