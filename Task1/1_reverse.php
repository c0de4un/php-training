<?php

class Test {
    /** @var Test|null */
    public $next;
}

/**
 * @param   Test|null    $a
 * @return  Test
 */
function reverse($a) {
    if ($a === null || $a->next === null) {
        return $a;
    }

    $newHead = reverse($a->next);
    $a->next->next = $a;
    $a->next = null;

    return $newHead;
}

$a = new Test();
$b = new Test();
$c = new Test();
$a->next = $b;
$b->next = $c;
$c->next = null;

$ob1 = reverse($a);
var_dump($ob1);
