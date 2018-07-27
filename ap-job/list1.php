<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 7/27/2018
 * Time: 10:38 AM
 */

$mailRecord1 = ["julius alvarado", "sacramento", "ca", "95820"];

$mailingRecords = [
    ["Julius Alvarado", "Sacramento", "ca", "95820"],
    ["Ray Pruitt", "Roseville", "ca", "12345"],
    ["Richard Charlow", "Rancho Cordova", "ca", "12345"],
    ["Lidsey Hemphill", "Elk Grove", "ca", "12345"]
];

list($fullName, $city, $state, $zip) = $mailRecord1;

// echo "\n\n Mailing to $fullName who lives in $city, $state \n\n";

foreach ($mailingRecords as list($fullName, $city, $state, $zip)) {
    echo "\n Mailing to $fullName who lives in $city, $state \n";
}

echo "\n break \n";