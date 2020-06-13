<?php

namespace Seryiza\BrainGames\Games\ProgressionGame;

const NUMBERS_IN_SEQUENCE = 8;
const RULES = 'What number is missing in this progression?';

function getNumberSequence(int $startNumber, int $difference, int $sequenceSize): array
{
    $numbers = [];
    for ($i = 0; $i < $sequenceSize; $i++) {
        $numbers[] = $startNumber + $i * $difference;
    }
    return $numbers;
}

function formatNumbersWithHidedOne(array $numbers, int $hidingNumberIndex): string
{
    $numbers[$hidingNumberIndex] = '..';
    return implode(' ', $numbers);
}

function getProgressionGame(): array
{
    $game = function () {
        $startNumber = rand(1, 80);
        $difference = rand(1, 10);
        $numberSequence = getNumberSequence($startNumber, $difference, NUMBERS_IN_SEQUENCE);

        $hidedNumberIndex = rand(1, NUMBERS_IN_SEQUENCE - 2);
        $hidedNumber = $numberSequence[$hidedNumberIndex];

        $question = formatNumbersWithHidedOne($numberSequence, $hidedNumberIndex);
        return [$question, $hidedNumber];
    };

    return [RULES, $game];
}
