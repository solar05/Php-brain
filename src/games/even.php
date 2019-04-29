<?php

namespace BrainGames\Games\Even;

use function BrainGames\gameEngine\playGame;

const rules = 'Answer "yes" if number even otherwise answer "no"';

function isEven($num)
{
    return $num % 2 == 0;
}

function playEven()
{
    $getGameStage = function () {
        $question = rand(1, 1000);
        $answer = isEven($question) ? 'yes' : 'no';
        return array('question' => $question,
                     'answer' => $answer);
    };
    playGame($getGameStage, rules);
}
