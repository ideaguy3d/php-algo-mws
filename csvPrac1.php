<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 5/29/2018
 * Time: 12:29 AM
 */

$row = 1;

if (($handle = fopen("majide_fba_sales_v1.csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 10000, ",")) !== false) {
        $num = count($data);
        echo "<br><p>$num fields in line $row</p>";
        $row++;
        for ($c = 0; $c < $num; $c++) {
            echo $data[$c] . ", ";
        }
        echo "<br>";
    }
    fclose($handle);
}