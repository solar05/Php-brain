<?php
namespace BrainGames\Games\Progression;

use function BrainGames\gameEngine\playGame;

const RULES = 'What number is missing in the progression?';
const PROGRESSION_SIZE = 10;
function getProgression($progressionStep, $length)
{
    $firstElement = rand(1, 50);
    $progression = array($firstElement);
    for ($i = 1; $i < $length; $i += 1) {
        $prevElement = $progression[$i - 1];
        array_push($progression, $prevElement + $progressionStep);
    }
    return $progression;
}

function hideElement($array)
{
    $elementToHide = rand(1, 9);
    $hiddenElement = $array[$elementToHide];
    $newArray = $array;
    $newArray[$elementToHide] = '..';
    return array($newArray, $hiddenElement);
}

function playProgression()
{
    $getGameStage = function () {
        $progressionStep = rand(1, 50);
        $progression = getProgression($progressionStep, PROGRESSION_SIZE);
        $proceededProgr = hideElement($progression);
        $question = implode(' ', $proceededProgr[0]);
        $answer = $proceededProgr[1];
        return array('question' => $question,
            'answer' => $answer);
    };
    playGame($getGameStage, RULES);
}
