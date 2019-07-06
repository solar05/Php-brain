<?php

namespace BrainGames\Tests;

use function BrainGames\Games\Prime\isPrime;
use PHPUnit\Framework\TestCase;

class PrimeTest extends TestCase
{
    public function testPrime()
    {
        $this->assertTrue(isPrime(17));
        $this->assertTrue(isPrime(11));
        $this->assertFalse(isPrime(74));
        $this->assertFalse(isPrime(44));
        $this->assertFalse(isPrime(0));
    }
}