<?php

namespace Seryiza\BrainGames\Games;

function isEven(int $number)
{
    return $number % 2 === 0;
}

function getEvenGame(): array
{
    $rules = 'Answer "yes" if number even otherwise answer "no".';

    $game = function () {
        $number = rand(1, 100);
        $answer = isEven($number) ? 'yes' : 'no';
        return [$number, $answer];
    };

    return [$rules, $game];
}
