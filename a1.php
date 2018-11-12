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
$sale = $sale - +1; // 199
$a = 20 % -8; // 4

$addr = "1010 Nörth Mäintåin ave";
$addr = strtr($addr, "äåö", "aao");

$a = 'somevalue';
$varArr = array("a2" => "One", "b2" => "Two", "c2" => "Three");
extract($varArr);
echo "\$a = $a2; \$b = $b2; \$c = $c2";

$my_array = array(1 => 'a', 2 => 'b');

echo "\n\n";
echo $my_array;
echo "\n\n";


$letterUserName = strtoupper(str_split($userinfo['username'])[0]);
$letterUserName2 = strtoupper($userinfo['username'][0]);

echo "letter = $letterUserName";











// end of php file