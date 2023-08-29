<?php


declare(strict_types = 1)
;

namespace Tests\Filters;

use PHPCleanup\Sanitize;
use PHPUnit\Framework\TestCase;

final class EmailTest extends TestCase {

    public function testCanBeCreatedFromValidString()
    {
        $this->assertEquals('email#1@domain.com', Sanitize::email()->sanitize('email#1@domain.com    '));
        $this->assertEquals('username@email.org', Sanitize::email()->sanitize('username@email.org'));
        $this->assertEquals('email1@domain.com', Sanitize::email()->sanitize('email1@domain().com'));
    }
}
