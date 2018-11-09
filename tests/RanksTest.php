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
}