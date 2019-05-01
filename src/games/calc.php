<?php
namespace BrainGames\Games\Calc;

use function BrainGames\gameEngine\playGame;

const DESCRIPTION = 'What is the result of the expression?';
const OPERATIONS = array('+', '-', '*', '/');
const MAX_NUMBER = 50;


function playCalc()
{
    $executeOperations = array(
       '+' =>
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
            $chooseOperation = rand(0, 3);
        } else {
            $chooseOperation = rand(0, 2);
        }
        $currentOperation = OPERATIONS[$chooseOperation];
        $question = "$firstNumber $currentOperation $secondNumber";
        $answer = $executeOperations[$currentOperation]($firstNumber, $secondNumber);
        return array('question' => $question,
        'answer' => $answer);
    };
    playGame($getGameStage, DESCRIPTION);
}
