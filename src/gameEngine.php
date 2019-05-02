<?php
namespace BrainGames\gameEngine;

use function \cli\line;
use function \cli\prompt;

const GAME_ROUNDS_COUNT = 3;

function playGame(callable $getGameStage, $gameDescription)
{
    line('Welcome to the Brain Games!');
    line('%s', $gameDescription);
    $playerName = prompt('May I have your name?');
    line('Hello, %s', $playerName);
    for ($correctAnswerCounter = 0; $correctAnswerCounter < GAME_ROUNDS_COUNT; $correctAnswerCounter += 1) {
        $currentGameStage = $getGameStage();
        line('Question: %s', $currentGameStage[0]);
        $playerAnswer = prompt('Your answer: ');
        if ($currentGameStage[1] == $playerAnswer) {
            line('Correct!');
        } else {
            line('"%s" is wrong answer ;(. Correct answer was "%s".', $playerAnswer, $currentGameStage[1]);
            break;
        }
    }
    if ($correctAnswerCounter == 3) {
        line('Congratulations, %s!', $playerName);
    } else {
        line('Let`s try again, %s', $playerName);
    }
}
