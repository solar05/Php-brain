<?php

namespace BrainGames\Tests;

use function BrainGames\Games\Even\isEven;
use PHPUnit\Framework\TestCase;

class EvenTest extends TestCase
{
    public function testEven()
    {
        $this->assertTrue(isEven(6));
        $this->assertTrue(isEven(0));
        $this->assertFalse(isEven(11));
        $this->assertFalse(isEven(3));
    }
}
