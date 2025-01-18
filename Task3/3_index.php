<?php

function getResult(array $boxes, int $weight): int
{
    $count = [];
    $trips = 0;

    foreach ($boxes as $box) {
        $complement = $weight - $box;

        if (isset($count[$complement]) && $count[$complement] > 0) {
            $trips++;
            $count[$complement]--;
        } else {
            if (!isset($count[$box])) {
                $count[$box] = 0;
            }
            $count[$box]++;
        }
    }

    return $trips;
}

$boxes = [1, 2, 1, 5, 1, 3, 5, 2, 5, 5];
$weight = 6;

var_dump(getResult($boxes, $weight));