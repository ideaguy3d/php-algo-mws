<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 7/24/2018
 * Time: 4:04 PM
 */

$csv1 = './56730.csv';
$csv2 = './tec-job12345.csv';

$handle1 = fopen($csv1, 'rb');
$handle2 = fopen($csv2, 'rb');

$file1 = fread($handle1, filesize($csv1)); 
$file2 = fread($handle2, filesize($csv2));
$file3 = str_replace("\n", "\r\n", $file2);

echo "inspect the files"; 