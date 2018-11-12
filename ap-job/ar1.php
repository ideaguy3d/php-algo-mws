<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 7/27/2018
 * Time: 11:44 AM
 */

$arr1 = ['one', 'two', 'three'];
$arr2 = ['three', 'four', 'five'];

echo "\n breakpoint \n";

$merge1 = array_merge($arr1, $arr2);
$mergeUnique1 = array_unique($merge1);

echo "\n breakpoint \n";