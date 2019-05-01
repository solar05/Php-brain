<?php
namespace BrainGames\Games\Prime;

use function BrainGames\gameEngine\playGame;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MAX_NUMBER = 100;

function isPrime($number)
{
    if ($number <= 2) {
        return false;
    }
    $divisor = 2;
    while (($divisor * $divisor <= $number) && ($number % $divisor != 0)) {
        $divisor += 1;
    }
    return $divisor * $divisor > $number;
}

function playPrime()
{
    $getGameStage = function () {
        $number = rand(1, MAX_NUMBER);
        $question = $number;
        $answer = isPrime($number) ? 'yes' : 'no';
        return array('question' => $question,
            'answer' => $answer);
    };
    playGame($getGameStage, DESCRIPTION);
}
