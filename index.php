<?php
declare(strict_types=1);
require_once 'lib.php';

// Ranks of all previous games
$ranks = ranks(7, '100 100 50 40 40 20 10', 4, [5, 25, 50, 120]);
foreach ($ranks as $rank) {
    echo $rank . "<br>";
}

// Updated rank
echo '<hr>';
echo rankOfGame(120, [125, 125, 120, 120, 100, 100, 50, 40, 40, 20, 10]);

// Find out rank with a huge array of scores
/*
$start = microtime(true);
$scores = '';
for ($i = MAX_SCORES / 10; $i >= MIN_SCORES; $i-=100) {
    $scores .= $i.' ';
}
echo '<br><br>';
$ranks = ranks(7, $scores, 4, [5, 25, 50, 120]);
echo microtime(true) - $start;
*/