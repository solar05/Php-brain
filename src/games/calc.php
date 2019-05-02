<?php
namespace BrainGames\Games\Calc;

use function BrainGames\gameEngine\playGame;

const DESCRIPTION = 'What is the result of the expression?';
const OPERATIONS = array('+', '-', '*', '/');
const MAX_NUMBER = 50;
const OPERATIONS_WITH_DIVISION = 3;
const OPERATIONS_WITHOUT_DIVISION = 2;

function playCalc()
{
    $executeOperations = array('+' =>
    function ($a, $b) {
        return $a + $b;
    }, '-' =>
    function ($a, $b) {
        return $a - $b;
    }, '*' =>
    function ($a, $b) {
        return $a * $b;
    }, '/' =>
    function ($a, $b) {
        return $a / $b;
    }
    );
    $getGameStage = function () use ($executeOperations) {
        $firstNumber = rand(1, MAX_NUMBER);
        $secondNumber = rand(1, MAX_NUMBER);
        if ($firstNumber % $secondNumber == 0) {
            $chooseOperation = rand(0, OPERATIONS_WITH_DIVISION);
        } else {
            $chooseOperation = rand(0, OPERATIONS_WITHOUT_DIVISION);
        }
        $currentOperation = OPERATIONS[$chooseOperation];
        $question = "$firstNumber $currentOperation $secondNumber";
        $answer = $executeOperations[$currentOperation]($firstNumber, $secondNumber);
        return array($question, $answer);
    };
    playGame($getGameStage, DESCRIPTION);
}
