<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 7/30/2018
 * Time: 6:20 PM
 */

$ascii1 = "Ï¿½esme";
$ascii1arr = [
    "Ï",
    '¿',
    '½'
];
echo "\n\n val 1 = " . ord($ascii1arr[0]);
echo "\n\n val 2 = " . chr(36);
echo "\n\n val 2 = " . chr(ord($ascii1arr[0]));
echo "\n\n";
