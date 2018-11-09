<?php
declare(strict_types=1);
require_once 'lib.php';

// Ranks of all previous games
$ranks = ranks(7, '100 100 50 40 40 20 10', 4, [5, 25, 50, 120]);
foreach ($ranks as $rank) {
    echo $rank . "<br>";
}

// Updated rank
echo rankOfGame(120, [125, 125, 120, 120, 100, 100, 50, 40, 40, 20, 10]);