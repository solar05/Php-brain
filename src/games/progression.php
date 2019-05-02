<?php
namespace BrainGames\Games\Progression;

use function BrainGames\gameEngine\playGame;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_SIZE = 10;
const PROGRESSION_MAX_NUMBER = 50;

function getProgression($firstElement, $progressionStep, $length)
{
    $progression = array();
    for ($counter = 0; $counter < $length; $counter += 1) {
        $nextElement = $firstElement + $progressionStep * $counter;
        array_push($progression, $nextElement);
    }
    return $progression;
}

function hideProgressionElement($elementToHide, $progression)
{
    $hiddenElement = $progression[$elementToHide];
    $progressionWithoutElement = $progression;
    $progressionWithoutElement[$elementToHide] = '..';
    return array($progressionWithoutElement, $hiddenElement);
}

function playProgression()
{
    $getGameStage = function () {
        $progressionStep = rand(1, PROGRESSION_MAX_NUMBER);
        $firstProgressionElement = rand(1, PROGRESSION_MAX_NUMBER);
        $progression = getProgression($firstProgressionElement, $progressionStep, PROGRESSION_SIZE);
        $elementToHide = rand(0, PROGRESSION_SIZE - 1);
        $proceededProgression = hideProgressionElement($elementToHide, $progression);
        $question = implode(' ', $proceededProgression[0]);
        $answer = $proceededProgression[1];
        return array($question, $answer);
    };
    playGame($getGameStage, DESCRIPTION);
}
