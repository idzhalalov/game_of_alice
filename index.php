<?php
require_once 'lib.php';

$ranks = ranks(7, '100 100 50 40 40 20 10', 4, [5, 25, 50, 120]);
foreach ($ranks as $rank) {
    echo $rank . "<br>";
}
