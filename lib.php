<?php
declare(strict_types=1);

function ranks(
    int $membersCount,
    string $scores,
    int $aliceGamesCount,
    array $aliceScores
): array {
    $result = [];
    $scoresArray = explode(' ', str_replace('  ', ' ', $scores));
    foreach ($aliceScores as $score) {
        $result[] = rankOfGame($score, $scoresArray);
    }

}

function rankOfGame(int $scoreOfGame, array $allScores)
{
    array_push($allScores, $scoreOfGame);
    arsort($allScores);
    $allScores = array_values(array_unique($allScores));
    return array_search($scoreOfGame, $allScores) + 1;
}