<?php
declare(strict_types=1);

const BASE = 2;
const EXP = 10;
const MAX_MEMBERS = BASE * (EXP ** 5);
const MAX_SCORES = EXP ** 9;

/**
 * Get ranks of all games
 *
 * @param int    $membersCount    The game members count
 * @param string $scores          Total scores of the game
 * @param int    $aliceGamesCount Total games of Alice
 * @param array  $aliceScores     Scores of Alice
 *
 * @return array Ranks of games
 *
 * @throws Exception When one of limits is exceeded
 * ($membersCount and $aliceGamesCount are limited with MAX_MEMBERS constant;
 * and any score is limited by MAX_SCORES)
 */
function ranks(
    int $membersCount,
    string $scores,
    int $aliceGamesCount,
    array $aliceScores
): array {
    $result = [];
    $scoresArray = explode(' ', str_replace('  ', ' ', $scores));

    // Check for limitations
    if ($membersCount > MAX_MEMBERS) {
        throw new Exception('Too many members. Max members count is '
            .MAX_MEMBERS);
    }
    if ($aliceGamesCount > MAX_MEMBERS) {
        throw new Exception('Too many games count. Max games count is '
            .MAX_MEMBERS);
    }
    array_walk($scoresArray, function ($score) {
        if ($score > MAX_SCORES) {
            throw new Exception('Too large value of a score '.$score
                .'. Max possible score is '.MAX_SCORES);
        }
    });

    foreach ($aliceScores as $score) {
        if ($score > MAX_SCORES) {
            throw new Exception('Too large value of a score '.$score
                .'. Max possible score is '.MAX_SCORES);
        }

        $result[] = rankOfGame($score, $scoresArray);
    }

    return $result;
}

/**
 * Get rank of current game
 *
 * @param int   $scoreOfGame Scores of a game
 * @param array $allScores   All scores
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