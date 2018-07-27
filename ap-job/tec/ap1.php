<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 7/6/2018
 * Time: 10:48 AM
 */

// for quick snippets of code to solve stuff real quick

$pracStr1 = "BEN-HUR O GAGAN JR";
// edge case 1, full name has a number and a /\W/ char
$pracStr2 = "DURRI9CK COLEMAN & ALVINA HAYES COLEMAN";
// edge case 2, & char
$pracStr3 = "Derrick & Ashley ";
// edge case 3, the full name only has 1 name
$pracStr4 = "HARVE";
// all the other edge cases to test for
$edgeCases = [
    "NEWMAN, KENNE TH E/DEBORAH A",
    "WRIGHT,LEO M",
    "KLINGENER, JAMES BARRY JR/HETAL G",
    "KEATING, III, JOSEPH J",
    "YOUNG, GEORGE A JR/LAURA E",
    "NOENING,JESHIA",
    "GETER, FREEMAN, H, III",
    "O'MEARA BRIAN"
];

$match = preg_match('/^(\w+\-\w+)/i', $pracStr1, $matches);

echo "match = $match";

var_dump($matches);

echo "break";
