<?php
namespace BrainGames\Games\Prime;

use function BrainGames\gameEngine\playGame;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($number)
{
    if ($number <= 2) {
        return true;
    }
    for ($i = 2; $i < sqrt($number); $i += 1) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

function playPrime()
{
    $getGameStage = function () {
        $number = rand(1, 100);
        $question = $number;
        $answer = isPrime($number) ? 'yes' : 'no';
        return array('question' => $question,
            'answer' => $answer);
    };
    playGame($getGameStage, DESCRIPTION);
}
