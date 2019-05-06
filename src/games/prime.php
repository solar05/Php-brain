<?php
namespace BrainGames\Games\Prime;

use function BrainGames\gameEngine\playGame;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MAX_NUMBER = 100;

function isPrime($number)
{
    if ($number < 2) {
        return false;
    }
    for ($divisor = 2; $divisor <= sqrt($number); $divisor += 1) {
        if ($number % $divisor == 0) {
            return false;
        }
    }
    return true;
}

function playPrime()
{
    $getGameStage = function () {
        $question = rand(1, MAX_NUMBER);
        $answer = isPrime($question) ? 'yes' : 'no';
        return array($question, $answer);
    };
    playGame($getGameStage, DESCRIPTION);
}
