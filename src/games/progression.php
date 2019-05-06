<?php
namespace BrainGames\Games\Progression;

use function BrainGames\gameEngine\playGame;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_SIZE = 10;
const PROGRESSION_MAX_NUMBER = 50;

function getProgression($firstElement, $step, $length)
{
    $progression = array();
    for ($counter = 0; $counter < $length; $counter += 1) {
        $nextElement = $firstElement + $step * $counter;
        array_push($progression, $nextElement);
    }
    return $progression;
}

function playProgression()
{
    $getGameStage = function () {
        $step = rand(1, PROGRESSION_MAX_NUMBER);
        $firstProgressionElement = rand(1, PROGRESSION_MAX_NUMBER);
        $progression = getProgression($firstProgressionElement, $step, PROGRESSION_SIZE);
        $hiddenElementIndex = rand(0, PROGRESSION_SIZE - 1);
        $answer = $progression[$hiddenElementIndex];
        $progression[$hiddenElementIndex] = '..';
        $question = implode(' ', $progression);
        return array($question, $answer);
    };
    playGame($getGameStage, DESCRIPTION);
}
