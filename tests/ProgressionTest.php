<?php

namespace BrainGames\Tests;

use PHPUnit\Framework\TestCase;
use function BrainGames\Games\Progression\getProgression;

class Test extends TestCase
{
    public function testProgression()
    {
        $this->assertEquals([5, 6, 7], getProgression(5, 1, 3));
        $this->assertEquals([1, 5 , 9, 13, 17], getProgression(1, 4, 5));
    }
}
