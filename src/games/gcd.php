<?php
namespace BrainGames\Games\Gcd;

use function BrainGames\gameEngine\playGame;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const MAX_NUMBER = 100;

function findGcd($firstNum, $secondNum)
{
    if (!$secondNum) {
        return $firstNum;
    }
    return findGcd($secondNum, $firstNum % $secondNum);
}

function playGcd()
{
    $getGameStage = function () {
        $firstNumber = rand(1, MAX_NUMBER);
        $secondNumber = rand(1, MAX_NUMBER);
        $question = "$firstNumber $secondNumber";
        $answer = findGcd($firstNumber, $secondNumber);
        return array('question' => $question,
            'answer' => $answer);
    };
    playGame($getGameStage, DESCRIPTION);
}
