<?php
declare(strict_types=1);

$iterations = 10;

function fibonacci1(int $n, string $order) {
    $break = 'point';
    if($n === 1 || $n === 0) {
        return $n;
    }
    return fibonacci1($n - 2, '1st') + fibonacci1($n - 1, '2nd');
}

for($i = 0; $i < $iterations; $i++) {
    echo "\n\nincrementer = $i, fibonacci return:\n";
    echo fibonacci1($i, 'origin');
}













