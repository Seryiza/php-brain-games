<?php

namespace Seryiza\BrainGames\Games;

use function cli\line;
use function cli\prompt;

function isEven(int $number)
{
    return $number % 2 === 0;
}

function getEvenGame(): callable
{
    return function () {
        $number = rand(1, 100);
        $correctAnswer = isEven($number) ? 'yes' : 'no';

        line("Question: {$number}");
        $enteredAnswer = prompt('Your answer');

        $isCorrect = $enteredAnswer === $correctAnswer;
        if ($isCorrect) {
            line('Correct!');
        } else {
            line("'{$enteredAnswer}' is wrong answer :( Correct answer was '{$correctAnswer}'.");
        }

        return $isCorrect;
    };
}
