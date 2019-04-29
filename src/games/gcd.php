<?php
namespace BrainGames\Games\Gcd;

use function BrainGames\gameEngine\playGame;

const RULES = 'Find the greatest common divisor of given numbers.';

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
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);
        $question = "$firstNumber $secondNumber";
        $answer = findGcd($firstNumber, $secondNumber);
        return array('question' => $question,
            'answer' => $answer);
    };
    playGame($getGameStage, RULES);
}
