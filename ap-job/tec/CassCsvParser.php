<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 7/6/2018
 * Time: 6:49 PM
 */

//-- test Class for reading and writing to and from CSV files:
class CassCsvParser
{
    /**
     * Container function to parse a single CSV file for quick calculations
     * or custom algorithms against a single file
     * @param $csvPath - name of CSV file include .csv
     */
    public function parseCsvFile($csvPath) {
        $handle = fopen($csvPath, 'r');
        $csv = [];
        $count = 0;
        $csvFileName = basename($csvPath);
        $dest = "./csv-data-output/$csvFileName";
    
        echo "\n\n>>>>>>>>>>> Processing The CSV file, this may take a sec or 2\n\n";
    
        while (($data = fgetcsv($handle, 4096, ',')) !== false) {
            $record = [];
            $headers = isset($csv[0]) ? $csv[0] : null;
            if ($headers) {
                // =============== O(n^2) ===============
                for ($i = 0; $i < count($headers); $i++) {
                    // idx 7 and 8 don't get set till later
                    if ($i !== 7 && $i !== 8) {
                        $record[$headers[$i]] = $data[$i];
                    }
                }
                $csv[$count] = $record;
            }
            else {
                $csv[$count] = $data;
                $offset = count($csv[$count]);
                $csv[$count][$offset] = 'First';
                $csv[$count][++$offset] = 'Last';
            }
            $count++;
        
            // TODO: refactor this loop to its' own private function
            // this should split 'FULLNAME' field to 'First' & 'Last' name field for AccuZip
            // but it currently doesn't check for middle initial or middle name :(
            for ($i = 1; $i < count($csv); $i++) {
                $fullName = $csv[$i]['FULLNAME'];
                // match a regular first name "Joseph", "Jennifer", etc.
                if (preg_match('/^[a-z]+\s/i', $fullName, $matches)) {
                    $first = $matches[0];
                }
                // match a name like "Ben-Hur"
                else if (preg_match('/\w+\-\w+/', $fullName, $matches)) {
                    $first = $matches[0];
                }
                // first name probably has '&' or some other odd char
                else if (preg_match('/[!@#$%^&*]/', $fullName, $matches)) {
                    $first = "REGEX_PATTERN_FOUND_NON_ALPHANUMERIC_CHAR = " . $matches[0];
                }
                else {
                    $first = "REGEX_PATTERN_NO_MATCH = [$fullName]";
                }
            
                $csv[$i]['First'] = $first;
                $csv[$i]['Last'] = str_replace($first, '', $csv[$i]['FULLNAME']);
                trim($csv[$i]['Last']);
                echo "\n$i) first = $first\n";
            }
        
            // $csv is now a copy of the csv file, idx 0 is the header row.
            $output = fopen($dest, 'w') or exit("mheata - unable to open $dest");
            foreach ($csv as $value) {
                fputcsv($output, $value);
            }
            fclose($output);
            fclose($handle);
            echo "break";
        }
    }
    
    /**
     * Container function to start Parsing a large number of CSVs
     * - this function will uses glob()
     */
    public function parseCsvDirectory() {
    
    }
}

$csvScript = new CassCsvParser();

$csvScript->parseCsvFile('./56324_orig.csv');