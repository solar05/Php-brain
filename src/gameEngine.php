<?php
namespace BrainGames\gameEngine;

use function \cli\line;
use function \cli\prompt;

function greet($gameDesc) {
    line('Welcome to the Brain Games!');
    line('%s', $gameDesc);
}

function getPlayerName() {
    $name = prompt('May I have your name?');
    line('Hello, %s',$name);
    return $name;
}


function playGame($getGameStage, $rules)
{
    greet($rules);
    $playerName = getPlayerName();
    $correctAnswerCounter = 0;
    while ($correctAnswerCounter < 3) {
        $currentGameStage = $getGameStage();
        line('Question: %d', $currentGameStage['question']);
        $playerAnswer = prompt('Your answer: ');
        if ($currentGameStage['answer'] == $playerAnswer) {
            $correctAnswerCounter += 1;
            line('Correct!');
        } else {
            line('"%s" is wrong answer ;(. Correct answer was "%s".', $playerAnswer, $currentGameStage['answer']);
            break;
        }
    }
    if ($correctAnswerCounter == 3) {
        line('Congratulations, %s!', $playerName);
    } else {
        line('Let`s try again, %s', $playerName);
    }
}