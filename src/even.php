<?php

namespace BrainGames\even;

function isEven($num)
{
    return $num % 2 == 0;
}

function playEven()
{
    $gameplay = array([]);
    $numToPlay = rand(1, 1000);
    $gameplay[0] = $numToPlay;
    $gameplay[1] = isEven($numToPlay) ? 'yes' : 'no';
    return $gameplay;
}
