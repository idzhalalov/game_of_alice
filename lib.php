<?php
declare(strict_types=1);

const BASE = 2;
const EXP = 10;
const MAX_MEMBERS = BASE * (EXP ** 5);
const MAX_GAMES = MAX_MEMBERS;
const MAX_SCORES = EXP ** 9;
const MIN_MEMBERS = 1;
const MIN_GAMES = 1;
const MIN_SCORES = 0;

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
 * ($membersCount and $aliceGamesCount are limited with MAX_MEMBERS and MIN_MEMBERS constant;
 * and any score is limited by MAX_SCORES and MIN_SCORES)
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
    if ($membersCount > MAX_MEMBERS || $membersCount < MIN_MEMBERS) {
        throw new Exception('Invalid value of $membersCount: '.$membersCount
            .'. Limit is exceeded');
    }

    if ($aliceGamesCount > MAX_MEMBERS || $aliceGamesCount < MIN_MEMBERS) {
        throw new Exception('Invalid value of $aliceGamesCount: '
            .$aliceGamesCount.'. Limit is exceeded');
    }
    array_walk($scoresArray, function ($score) {
        if ($score > MAX_SCORES || $score < MIN_SCORES) {
            throw new Exception('Invalid value of score in $scoresArray: '
                .$score.'. Limit is exceeded');
        }
    });

    foreach ($aliceScores as $score) {
        if ($score > MAX_SCORES || $score < MIN_SCORES) {
            throw new Exception('Invalid value of score in $aliceScores: '
                .$score.'. Limit is exceeded');
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
    rsort($allScores, SORT_NUMERIC);
    $allScores = array_merge(array_flip(array_flip($allScores)));

    return array_search($scoreOfGame, $allScores) + 1;
}