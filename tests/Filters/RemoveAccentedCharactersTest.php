<?php

declare(strict_types = 1);

namespace Tests\Filters;

use PHPCleanup\Sanitize;
use PHPUnit\Framework\TestCase;

final class RemoveAccentedCharactersTest extends TestCase {

    public function testCanBeCreatedFromValidString()
    {
        $this->assertEquals("Qu'a ca, qu'a la, mon ami?", Sanitize::removeAccentedCharacters()->sanitize("Qu'á çà, qu'á là, mon ami?"));
        $this->assertEquals("Aguas passadas nao movem moinhos.", Sanitize::removeAccentedCharacters()->sanitize("Águas passadas não movem moinhos."));
        $this->assertEquals("El nandu es un ave autoctona de America del Sur.", Sanitize::removeAccentedCharacters()->sanitize("El ñandú es un ave autóctona de América del Sur."));
        $this->assertEquals("A, jag vill leva, jag vill do i Norden!", Sanitize::removeAccentedCharacters()->sanitize("Å, jag vill leva, jag vill dö i Norden!"));
        $this->assertEquals("Orale, guey, que onda!", Sanitize::removeAccentedCharacters()->sanitize("Órale, güey, qué onda!"));
    }
}
