<?php
declare(strict_types=1);

require 'lib.php';

use PHPUnit\Framework\TestCase;

class RanksTest extends TestCase
{
    public function testRanks()
    {
        $ranks = ranks(7, '100 100 50 40 40 20 10', 4, [5, 25, 50, 120]);
        $this->assertEquals([6, 4, 2, 1], $ranks);
    }

    public function testRankOfGame()
    {
        $this->assertEquals(6, rankOfGame(5, [100, 100, 50, 40, 40, 20, 10]));
        $this->assertEquals(4, rankOfGame(25, [100, 100, 50, 40, 40, 20, 10]));
        $this->assertEquals(2, rankOfGame(50, [100, 100, 50, 40, 40, 20, 10]));
        $this->assertEquals(1, rankOfGame(120, [100, 100, 50, 40, 40, 20, 10]));
    }
}