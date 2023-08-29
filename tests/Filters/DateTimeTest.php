<?php


declare(strict_types = 1)
;

namespace Tests\Filters;

use PHPCleanup\Sanitize;
use PHPUnit\Framework\TestCase;
use DateTime;

final class DateTimeTest extends TestCase {

    public function testCanBeCreatedFromValidString()
    {
        $this->assertEquals((new DateTime('2023-08-10 10:15:00'))->getTimestamp(), Sanitize::dateTime()->sanitize('2023-08-10 10:15:00')->getTimestamp());
        $this->assertEquals((new DateTime('2023-08-10 10:15:00'))->getTimestamp(), Sanitize::dateTime()->sanitize('2023-08-10 10:15:00asfasdfdsf')->getTimestamp());
        $this->assertEquals((new DateTime('2023-08-10 10:15:00'))->getTimestamp(), Sanitize::dateTime()->sanitize('2023-08-10 10:15:00    ')->getTimestamp());
        $this->assertEquals((new DateTime('2023-08-10 10:15:00'))->getTimestamp(), Sanitize::dateTime('d/m/Y H:i:s')->sanitize('    10/08/2023 10:15:00')->getTimestamp());
    }
}
