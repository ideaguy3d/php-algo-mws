<?php
declare(strict_types=1);

$iterations = 10;
$recurses = 0;
$recurseArray = [];

//
function fibonacci1(
    int $n, string $order, int &$recurses, array &$recurseArray
): int {
    $recurses++;
    if($n === 1 || $n === 0) {
        $recurseArray [] = $n;
        return $n;
    }
    $sum = array_sum($recurseArray);
    echo " \n__>> {order: [$order], sum: $sum, n: $n} recursion start __>> ";
    $break = 'point';
    return fibonacci1($n - 2, '1st', $recurses, $recurseArray)
        + fibonacci1($n - 1, '2nd', $recurses, $recurseArray);
}

for($i = 0; $i < $iterations; $i++) {
    echo "\n\n\nincrementer = $i, fibonacci return:";
    echo(
        fibonacci1($i, 'origin', $recurses, $recurseArray)
        . " ~in $recurses recurses"
    );
    
    //-- reset:
    $recurses = 0;
    $recurseArray = [];
}













