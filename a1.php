<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/19/2018
 * Time: 1:20 PM
 */



$userinfo['username'] = "ninjaHacker";
$firstLetter = $userinfo['username'][0];

$a = 210;
$b = 'a';

$sale = 200;
$sale = $sale- + 1; // 199
$a = 20%-8; // 4

$addr = "1010 Nörth Mäintåin";
$addr = strtr($addr, "äåö", "aao");

$a = 'somevalue';
$varArr = array("a" => "One","b" => "Two", "c" => "Three");
extract($varArr);
echo "\$a = $a; \$b = $b; \$c = $c";



$my_array = array(1 => 'a', 2 => 'b');

echo "\n\n";
echo $my_array;
echo "\n\n";


$letterUserName = strtoupper(str_split($userinfo['username'])[0]);
$letterUserName2 = strtoupper($userinfo['username'][0]);

echo "letter = $letterUserName";











// end of php file