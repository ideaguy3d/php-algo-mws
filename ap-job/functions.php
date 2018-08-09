<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 8/3/2018
 * Time: 6:12 PM
 */

/**
 * Simple get a CSV file, transform it to an array
 * and return it
 *
 * @param $path
 * @return array
 */
function transformCsvToArr (string $path): array {
    $csvFileFolder = glob("$path/*.csv");
    $csvFile = $csvFileFolder[0];
    $csv = [];
    $count = 0;
    
    if(($handle = fopen($csvFile, 'r')) !== false) {
        while(($data = fgetcsv($handle, 8096, ",")) !== false) {
            $csv[$count] = $data;
            ++$count;
        }
        fclose($handle);
    }
    
    return $csv;
}

/**
 * This is from the parseCsvSimple2.php file
 *
 * Just input csv file, transform it to an array, do simple
 * modifications to fields, output the array as a csv
 *
 * @param $csvFiles
 * @param $destFolder
 * @param $moveFolder
 *
 */
function parseCsvFilesSimple($csvFiles, $destFolder, $moveFolder = null): void {
    $csv = [];
    $csvFiles = glob($csvFiles . "/*.csv", GLOB_NOCHECK);
    
    //-- transform the CSV into a php array:
    // there should probably always be a just 1 csv file, so CSV files should be
    // an array of 1, actually a foreach loop is overkill since it's an array of 1
    foreach ($csvFiles as $csvFile) {
        if(($handle = fopen($csvFile, 'r') )!== false) {
            $fileName = basename($csvFile);
            $count = 0;
            
            // transform CSV to an array
            // this is where I can modify fields
            while(($data = fgetcsv($handle, 8096, ",")) !== false) {
                if($count !== 0) {
                    $data[count($data)] = "php did some work - julius :)";
                } else {
                    $data[count($data)] = "php_work";
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
            
            // move the CSV files so AccuZip doesn't start fire back up
            if($moveFolder) {
                // echo "\n\n csv file = $csvFile \n\n";
                rename($csvFile, $moveFolder . "/$fileName");
            }
        }
    }
}


//