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
    for ($i = 0; $i < GAME_ROUNDS_COUNT; $i += 1) {
        [$question, $answer] = $getGameStage();
        line('Question: %s', $question);
        $playerAnswer = prompt('Your answer: ');
        if ($answer == $playerAnswer) {
            line('Correct!');
        } else {
            line('"%s" is wrong answer ;(. Correct answer was "%s".', $playerAnswer, $answer);
            line('Let`s try again, %s!', $playerName);
            return;
        }
    }
    line('Congratulations, %s!', $playerName);
    return;
}
