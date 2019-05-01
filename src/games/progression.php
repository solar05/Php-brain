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

function hideElement($progression)
{
    $chooseElementToHide = rand(0, PROGRESSION_SIZE - 1);
    $hiddenElement = $progression[$chooseElementToHide];
    $progressionWithoutElement = $progression;
    $progressionWithoutElement[$chooseElementToHide] = '..';
    return array($progressionWithoutElement, $hiddenElement);
}

function playProgression()
{
    $getGameStage = function () {
        $progressionStep = rand(1, PROGRESSION_MAX_NUMBER);
        $firstProgressionElement = rand(1, PROGRESSION_MAX_NUMBER);
        $progression = getProgression($firstProgressionElement, $progressionStep, PROGRESSION_SIZE);
        $proceededProgression = hideElement($progression);
        $question = implode(' ', $proceededProgression[0]);
        $answer = $proceededProgression[1];
        return array('question' => $question,
            'answer' => $answer);
    };
    playGame($getGameStage, DESCRIPTION);
}
