<?php 

declare(strict_types=1);

namespace Tests\Filters;

use PHPUnit\Framework\TestCase;
use PHPCleanup\Sanitize;

final class FactoryTest extends TestCase {

    public function testCallUnexistFilterThrowException() { 

        $this->expectException(\Exception::class);

        Sanitize::unExistFilter()->sanitize("rawData");
    }
}