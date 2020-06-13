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
        [$questionText, $correctAnswer] = $game();

        line("Question: {$questionText}");
        $enteredAnswer = prompt('Your answer');

        $isCorrect = $enteredAnswer === (string) $correctAnswer;
        if ($isCorrect) {
            line('Correct!' . PHP_EOL);
        } else {
            line("'{$enteredAnswer}' is wrong answer :( Correct answer was '{$correctAnswer}'.");
            break;
        }
    }

    $didWin = $i === GAMES_COUNT_TO_WIN;
    if ($didWin) {
        line("Congratulations, {$playerName}!");
    } else {
        line("Let's try again, {$playerName}!");
    }
}
