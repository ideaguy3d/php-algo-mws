<?php
declare(strict_types=1);

$iterations = 10;
$recurses = 0;
$recurseArray = [];

function fibonacci1(int $n, string $order, int &$recurses, array &$recurseArray): int {
    $recurses++;
    
    if($n === 1 || $n === 2) {
        $recurseArray [] = $n;
        return 1;
    }
    
    $sum = array_sum($recurseArray);
    echo " __>> {o: [$order], sum: $sum, n: $n} recursion start __>> \n";
    
    $break = 'point';
    
    return fibonacci1($n - 1, '1st', $recurses, $recurseArray)
        + fibonacci1($n - 2, '2nd', $recurses, $recurseArray);
}

for($i = 1; $i < $iterations; $i++) {
    echo "\n\n\ni = $i | fibonacci return:\n";
    echo(
        fibonacci1($i, 'origin', $recurses, $recurseArray)
        . " ($recurses recurses)"
    );
    
    //-- reset:
    $recurses = 0;
    $recurseArray = [];
}

