<?php
namespace BrainGames\gameEngine;

use function \cli\line;
use function \cli\prompt;

const GAME_ROUNDS = 3;

function greet($gameDescription)
{
    line('Welcome to the Brain Games!');
    line('%s', $gameDescription);
}

function getPlayerName()
{
    $name = prompt('May I have your name?');
    line('Hello, %s', $name);
    return $name;
}


function playGame(callable $getGameStage, $gameDescription)
{
    greet($gameDescription);
    $playerName = getPlayerName();
    for ($correctAnswerCounter = 0; $correctAnswerCounter < GAME_ROUNDS; $correctAnswerCounter += 1) {
        $currentGameStage = $getGameStage();
        line('Question: %s', $currentGameStage['question']);
        $playerAnswer = prompt('Your answer: ');
        if ($currentGameStage['answer'] == $playerAnswer) {
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
