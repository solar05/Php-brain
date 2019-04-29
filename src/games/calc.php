<?php
namespace BrainGames\Games\Calc;

use function BrainGames\gameEngine\playGame;

const RULES = 'What is the result of the expression?';
const OPERATIONS = array('+', '-', '*', '/');

function playCalc()
{
    $executeOperations = array(
    function ($a, $b) {
        return $a + $b;
    },
    function ($a, $b) {
        return $a - $b;
    },
    function ($a, $b) {
        return $a * $b;
    },
    function ($a, $b) {
        return $a / $b;
    }
    );
    $getGameStage = function () use ($executeOperations) {
        $firstNumber = rand(1, 50);
        $secondNumber = rand(1, 50);
        if ($firstNumber % $secondNumber == 0) {
            $chooseOperation = rand(0, 3);
        } else {
            $chooseOperation = rand(0, 2);
        }
        $currentOperation = OPERATIONS[$chooseOperation];
        $question = "$firstNumber $currentOperation $secondNumber";
        $answer = $executeOperations[$chooseOperation]($firstNumber, $secondNumber);
        return array('question' => $question,
        'answer' => $answer);
    };
    playGame($getGameStage, RULES);
}
