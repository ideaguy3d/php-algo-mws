<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 3/6/2019
 * Time: 3:03 AM
 */


$recursions = 10;
function fibonacci(int $n, string $order): int {
    if ($n === 0 || $n === 1) {
        return $n;
    }
    echo $order;
    $break = 'point';
    return fibonacci($n - 2, 'first') + fibonacci($n - 1, 'second');
}

for ($i = 10; $i > 0; $i--) {
    echo $i;
    fibonacci($i, 'invoke');
}






//