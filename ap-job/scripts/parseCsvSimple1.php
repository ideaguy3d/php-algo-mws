<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 7/11/2018
 * Time: 11:39 AM
 *
 * When this script is invoked it will need to access an
 * AccuZip cass certified dbf or csv (by having fxp export the dbf)
 */

// command line:
// php C:\xampp\htdocs\tec1\t1.php

$localInput = "./_Hot";
$localOutput = "./_Working";

$accuzipInput = "D:\mhWork\_AUTO\_Cass\TecMailing\_j-php-phase";
$accuzipOutput = "D:\mhWork\_AUTO\_Cass\TecMailing\_j-post-phase";
$moveFolder = "D:\mhWork\_AUTO\_Cass\TecMailing\_Working";

$csvInput = $accuzipInput;
$csvOutput = $accuzipOutput;

//parseCsvFilesSimple($csvInput, $csvOutput, $moveFolder);

/**
 * Just input csv file, transform it to an array, do simple
 * modifications to fields, output the array as a csv
 *
 * @param $csvFiles
 * @param $destFolder
 * @param $moveFolder
 *
 */
function parseCsvFilesSimple($csvFiles, $destFolder, $moveFolder = null) {
    $csv = [];
    $csvFiles = glob($csvFiles . "/*.csv", GLOB_NOCHECK);
    
    //-- transform the CSV into a php array:
    // there should probably always be a just 1 csv file, so CSV files should be
    // an array of 1
    foreach ($csvFiles as $csvFile) {
        if(($handle = fopen($csvFile, 'r') )!== false) {
            $fileName = basename($csvFile);
            $count = 0;
            
            // transform CSV to an array
            // this is where I can modify fields
            while(($data = fgetcsv($handle, 8096, ",")) !== false) {
                if($count !== 0) {
                    $data[count($data)] = "php did some work - julius :)";
                }
                
                $csv[$count] = $data;
                $count++;
                
            }
            
            //-- Write the CSV array to a CSV file:
            $outputFile = fopen("$destFolder/php-$fileName", 'w') or exit('mh - unable to open $destFolder');
            foreach ($csv as $value) {
                fputcsv($outputFile, $value);
            }
            
            fclose($outputFile);
            fclose($handle);
            $csv = [];
            
            if($moveFolder) {
                // echo "\n\n csv file = $csvFile \n\n";
                rename($csvFile, $moveFolder . "/$fileName");
            }
        }
    }
}