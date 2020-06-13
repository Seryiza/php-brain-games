<?php

namespace Seryiza\BrainGames;

use function cli\line;
use function cli\prompt;

const GAMES_COUNT_TO_WIN = 3;

function playGame(string $gameRules, callable $game): void
{
    printGreetings();
    $playerName = prompt('May I have your name');

    line($gameRules);
    for ($i = 0; $i < GAMES_COUNT_TO_WIN; $i++) {
        $didWin = $game();
        if (!$didWin) {
            line("Let's try again, {$playerName}!");
            exit(0);
        }
    }

    line("Congratulations, {$playerName}!");
}
