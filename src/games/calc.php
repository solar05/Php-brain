<?php
namespace BrainGames\Games\Calc;

use function BrainGames\gameEngine\playGame;

const DESCRIPTION = 'What is the result of the expression?';
const OPERATIONS = array('+', '-', '*', '/');
const MAX_NUMBER = 50;

function playCalc()
{
    $executeOperations = array(
        '+' => function ($a, $b) {
            return $a + $b;
        },
        '-' => function ($a, $b) {
            return $a - $b;
        },
        '*' => function ($a, $b) {
            return $a * $b;
        },
        '/' => function ($a, $b) {
            return round($a / $b);
        }
    );
    $getGameStage = function () use ($executeOperations) {
        $firstNumber = rand(1, MAX_NUMBER);
        $secondNumber = rand(1, MAX_NUMBER);
        $chooseOperation = rand(0, count($executeOperations) - 1);
        $currentOperation = OPERATIONS[$chooseOperation];
        $question = "$firstNumber $currentOperation $secondNumber";
        $answer = $executeOperations[$currentOperation]($firstNumber, $secondNumber);
        return array($question, $answer);
    };
    playGame($getGameStage, DESCRIPTION);
}
