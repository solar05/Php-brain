<?php


namespace BrainGames\Tests;

use function BrainGames\Games\Gcd\findGcd;
use PHPUnit\Framework\TestCase;


class GcdTest extends TestCase
{
    public function testGcd()
    {
        $this->assertEquals(1, findGcd(50, 91));
        $this->assertEquals(6, findGcd(72, 78));
        $this->assertEquals(13, findGcd(52, 39));
        $this->assertEquals(10, findGcd(10, 80));
        $this->assertEquals(46, findGcd(46, 46));
    }
}
