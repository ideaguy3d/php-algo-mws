<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/2/2018
 * Time: 10:21 PM
 */

// Given an array of integers representing the color of each object
// Determine how many pairs of objects with matching colors there are.

$arr1 = [10, 20, 20, 10, 10, 30, 50, 10, 20];
$testCase1 = [
    count($arr1),
    $arr1
];

$pairs = sockMerchant($testCase1[0], $testCase1[1]);

echo "\n There were $pairs matching pairs! ^_^ \n";

function sockMerchant($n, $ar) {
    $arCopy = array_slice($ar, 0);
    $totalMatches = 0;
    for ($i = 0; $i < $n; $i++) {
        $item = $arCopy[$i];
        $pos = ++$i;
        $tempArray = array_slice($arCopy, $pos);
        if ($k = array_search($item, $tempArray)) {
            $matches = array_keys($ar, $tempArray[$k]);
            array_splice($ar, $matches[1], 1);
            ++$totalMatches;
        }
    }
    return $totalMatches;
}
