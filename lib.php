<?php
declare(strict_types=1);

/**
 * Get ranks of all games
 *
 * @param int $membersCount The game members count
 * @param string $scores Total scores of the game
 * @param $aliceGamesCount Total games of Alice
 * @param $aliceScores Scores of Alice
 *
 * @return array Ranks of games
 */
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

    return $result;
}

/**
 * Get rank of current game
 *
 * @param int $scoreOfGame Scores of a game
 * @param array $allScores All scores
 *
 * @return int Rank of the game
 */
function rankOfGame(int $scoreOfGame, array $allScores)
{
    array_push($allScores, $scoreOfGame);
    arsort($allScores);
    $allScores = array_values(array_unique($allScores));

    return array_search($scoreOfGame, $allScores) + 1;
}