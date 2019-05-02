<?php

namespace BrainGames\Games\Even;

use function BrainGames\gameEngine\playGame;
const MAX_NUMBER = 1000;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no"';

function isEven($num)
{
    return $num % 2 == 0;
}

function playEven()
{
    $getGameStage = function () {
        $question = rand(1, MAX_NUMBER);
        $answer = isEven($question) ? 'yes' : 'no';
        return array($question, $answer);
    };
    playGame($getGameStage, DESCRIPTION);
}
