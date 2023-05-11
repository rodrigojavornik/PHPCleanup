<?php

declare(strict_types = 1);

namespace Tests\Filters;

use PHPCleanup\Sanitize;
use PHPUnit\Framework\TestCase;

final class KeysTest extends TestCase {

    public function testCanBeCreatedFromValidString()
    {
        $list = [
            'name'  => '   carlos alberto    ',
            'age'   => '23r',
            'email' => ' ¨teste@teste.com   '
        ];

        $list = Sanitize::keys([
            'name'  => Sanitize::input()->uppercase(),
            'age'   => Sanitize::input()->onlyNumbers(),
            'email' => Sanitize::input()->email()
        ])->sanitize($list);

        $this->assertEquals('CARLOS ALBERTO', $list['name']);
        $this->assertEquals(23, $list['age']);
        $this->assertEquals('teste@teste.com', $list['email']);
    }
}
