<?php


echo "<br><h1>Redstone Print & Mail</h1><br><hr>";

// phpinfo();

$dbConnect = isset($_GET["db"]) ? $_GET["db"] : null;
$dbConnectTrueIA = ['1', 'y', 'true', 'yes'];
$action = isset($_GET["action"]) ? $_GET["action"] : null;

/********************************/
/*********** DEBUGGING **********/
$action = 'csv2';
/*********** DEBUGGING **********/
/********************************/

// Query SQL Server
if ($action === "db") {
    try {
        $conn = new PDO("sqlsrv:Server=192.168.7.16\RSMAUTO;Database=rsmauto", "mhetadata", "miguel");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (Exception $e) {
        die(print_r($e->getMessage()));
    }
    
    $tsql = "SELECT TOP(100) * FROM pracMailData2";
    $getResults = $conn->prepare($tsql);
    $getResults->execute();
    $resultSet = $getResults->fetchAll(PDO::FETCH_BOTH);
    
    foreach ($resultSet as $row) {
        echo "<strong>" . $row['_first_'] . "</strong> lives in <b>"
            . $row['_countynm__'] . "</b>";
        echo '<br>';
    }
}
// parse CSV data files
else if ($action === 'csv') {
    $csvPath = './csvI';
    $csvVersion = 1;
    outputParsedCsv1($csvPath, $csvVersion);
}
// let user user use multiple ways to basically say 'yes'
else if (in_array($dbConnect, $dbConnectTrueIA, true) === true) {
    echo "<p>array_search() = </p>";
    echo in_array($dbConnect, $dbConnectTrueIA);
    echo "<h1>array_search() worked ! ^_^</h1>";
    echo "<h2>dbConnect = $dbConnect</h2>";
}
// --------------------------------------------------------
// This is the "right shift up grouping" algorithm I wrote
// for Richard roughly around the week of 6-10-2018
// --------------------------------------------------------
else if ($action === 'csv2') {
    cleanMultipleProperties('./ci');
}
else {
    echo "<h1>Dang, nothing worked :\</h1>";
}

/**
 * $csvPath == './folderName'
 * @param $csvPath - a string to the folder that contains the csv data to parse
 */
function cleanMultipleProperties($csvPath) {
    // input CSV vars
    $path2csv = $csvPath . "/*.csv";
    // get all the csv files in $csvPath
    $files = glob($path2csv, GLOB_NOCHECK);
    
    // copy of the CSV into an assoc.arr
    $csv = [];
    $tempTracker = [];
    $count = 0;
    $fieldTitleKey = "";  // field title key will get set in the loop
    
    /**
     * PARSE THE CSV FILE AND CREATE A COPY OF IT INTO the $csv ASSOC.ARR
     */
    foreach ($files as $file) {
        if (($handle = fopen($file, 'r')) !== false) {
            $fileName = basename($file);
            echo "\n file $fileName is getting processed \n";
            $count = 0;
            
            //----------------
            // - inner loop -
            //----------------
            while (($data = fgetcsv($handle, 4096, ",")) !== false) {
                //$csv []= $data;
                // $key = $data[5] . "-" . $data[2]; // heinz dupes
                $key = $data[0] . "-" . $data[1]; // week 6-10-2018 dupes
                if (!isset($csv[$key])) {
                    $count = 0;
                    $csv[$key] = $data;
                    if ($csv[$key][0] === "first" && $csv[$key][1] === "last") {
                        $fieldTitleKey = $key;
                        array_unshift($csv[$key], 0);
                    }
                }
                else {
                    // merge into 1 row code
                    $wantedMergeData = [$data[8], $data[9], $data[10], $data[11]];
                    $csv[$key] = array_merge($csv[$key], $wantedMergeData);
                    
                    // dynamic field code
                    if ($count > $csv[$fieldTitleKey][0]) {
                        $dynamicFields = ["paddress$count", "pcity$count", "pstate$count", "pzip$count"];
                        $csv[$fieldTitleKey] = array_merge($csv[$fieldTitleKey], $dynamicFields);
                        $csv[$fieldTitleKey][0] = $count;
                    }
                    
                    var_dump($csv[$key]);
                    $count++;
                }
            }
            
            // quickly take out the count tracker for dynamic field generation
            if ($csv[$fieldTitleKey][0] !== 'first') {
                array_shift($csv[$fieldTitleKey]);
            }
            
            //----------------
            // - inner loop -
            //----------------
            $dataDest = "./co/$fileName";
            $outputFile = fopen($dataDest, 'w') or exit("mheta - unable to open $dataDest");
            foreach ($csv as $value) {
                fputcsv($outputFile, $value);
            }
            
            fclose($outputFile);
            fclose($handle);
            $csv = []; // clear out csv of old data
        }
        else {
            echo "<h1>index.php line 128 ish - error opening file $file</h1>";
        }
    }
}

function oldParseMultipleCsvDupes($doStuff) {
    $doOtherStuff = $doStuff;
    $csv = [];
    $count = 0;
    
    if ($doOtherStuff) {
        /**
         * CREATE THE ALL IMPORTANT $tempTracker array <3 <3 <3
         *
         * at this point the csv is completely copied into an assoc.arr
         * start at 2 because idx 1 is the header row and there is no idx 0
         */
        for ($i = 2; $i < count($csv); $i++) {
            // iterate over 'csv' array
            $rec = $csv[$i];
            $firstField = $rec[0];
            $lastField = $rec[1];
            $addressField = $rec[2];
            $cityField = $rec[3];
            $firstIndex = "$firstField-$lastField-$addressField-$cityField";
            
            // this just gets $tempTracker started, may not need it.
            if (isset($tempTracker[$firstIndex]) === false) {
                $count = 0;
                $tempTracker[$firstIndex][$count] = $rec;
            }
            else {
                $tempTracker[$firstIndex][++$count] = $rec;
                echo "\n new rec added to $firstIndex";
            }
            
            // if I wanted to do something to an individual field use this loop
            // for ($j = 0; $j < count($rec); $j++) { $field = $rec[$j]; }
        }
        
        // get all the individual keys from the $tempTracker array
        $tempTrackerKeys = array_keys($tempTracker);
        $groupedTempTracker = [];
        $csvOutputArray = [];
        $i2 = 0;
        
        /**
         * CREATE THE $csvOutputArray ARRAY
         */
        for ($i = 0; $i < count($tempTrackerKeys); $i++) {
            $key = $tempTrackerKeys[$i];
            // first field
            $groupedTempTracker[$i2] = $tempTracker[$key][0][0];
            // second field
            $groupedTempTracker[$i2 + 1] = $tempTracker[$key][0][1];
            // address field
            $groupedTempTracker[$i2 + 2] = $tempTracker[$key][0][2];
            // city field
            $groupedTempTracker[$i2 + 3] = $tempTracker[$key][0][3];
            // st field
            $groupedTempTracker[$i2 + 4] = $tempTracker[$key][0][4];
            // zip field
            $groupedTempTracker[$i2 + 5] = $tempTracker[$key][0][5];
            
            // now save all the manual labor coding array to $csvOutputArray
            $csvOutputArray[$i] = $groupedTempTracker;
            $i2 = 0;
        }
        
        /**
         * START MERGING ALL THE PERSONS INTO THE SAME RECORD
         *
         * by the time we get to this point $tempTracker is holding all the unique persons with each
         * unique persons' particular records, so now iterate over $tempTracker
         */
        $i2 = 0;
        foreach ($tempTracker as $person => $record) {
            // dynamically generate new fields in the $csv array
            $tempArray = [];
            for ($i = 0; $i < count($record); $i++) {
                if (isset($record[$i])) {
                    $item = $record[$i];
                    $tempArray[0] = $item[6];
                    $tempArray[1] = $item[7];
                    $tempArray[2] = $item[8];
                    $tempArray[3] = $item[9];
                    $mergeToArray = $csvOutputArray[$i2];
                    $csvOutputArray[$i2] = array_merge($mergeToArray, $tempArray);
                }
                else {
                    echo "\n\n There is an undefined offset, the current person is $person\n";
                }
            }
            $i2++;
        }
        
        /**
         * Generate the field title row
         */
        $largest = 0;
        for ($i = 0; $i < count($csvOutputArray); $i++) {
            $curArraySize = count($csvOutputArray[$i]);
            if ($largest === 0) {
                $largest = $curArraySize;
            }
            else if ($curArraySize > $largest) {
                $largest = $curArraySize;
            }
        }
        $fieldTitleRow = ['First', 'Last', 'Address', 'City', 'St', 'Zip'];
        $fieldTitleRow2 = [];
        $titleCounts = ($largest - 6) / 4;
        
        for ($i = 0, $i2 = 0; $i < $titleCounts; $i++) {
            $increment = 4 ^ $i;
            if ($i === 0) {
                $fieldTitleRow2[$i] = "paddress" . $i;
                $fieldTitleRow2[$i + 1] = "pcity" . $i;
                $fieldTitleRow2[$i + 2] = "pstate" . $i;
                $fieldTitleRow2[$i + 3] = "pzip" . $i;
            }
            else {
                $fieldTitleRow2[$i + $increment] = "paddress" . $i;
                $fieldTitleRow2[$i + 1 + $increment] = "pcity" . $i;
                $fieldTitleRow2[$i + 2 + $increment] = "pstate" . $i;
                $fieldTitleRow2[$i + 3 + $increment] = "pzip" . $i;
            }
            
        }
        
        $fieldTitleRow3 = array_merge($fieldTitleRow, $fieldTitleRow2);
        
        array_unshift($csvOutputArray, $fieldTitleRow3);
        
        // quickly take out the count tracker for dynamic field generation
        array_shift($csv[$fieldTitleKey]);
        
        /**
         * $csv should be a multidimensional array
         * Now start writing all the merged records to CSV
         * used to be $csvOutputArray
         */
        $dataDest = "./co/mutiple-propertys-MERGED.csv";
        $outputFile = fopen($dataDest, 'w') or exit('jha - unable to open file :(');
        foreach ($csv as $value) {
            fputcsv($outputFile, $value);
        }
        fclose($outputFile);
    }
}

function outputParsedCsv1($csvPath, $csvVersion) {
    $patternToMatch = "$csvPath$csvVersion/*.csv";
    echo "Pattern To Match = $patternToMatch";
    // $files = glob("$csvPath$csvVersion/*.csv"); // use variables
    $files = glob($patternToMatch, GLOB_NOCHECK); // {1}
    if ($files === $patternToMatch) { // match failed, notify user
        echo "there was something wrong with the pattern :(";
    }
    else {
        foreach ($files as $file) {
            if (($handle = fopen($file, 'r')) !== false) { // {2}
                echo "<br><br><h2>The Filename: " . basename($file) . "</h2><br><br>"; // {3}
                while (($data = fgetcsv($handle, 4096, ",")) !== false) { // {4}
                    echo implode("\t", $data); // to output all data from each CSV file
                }
                echo "<br>";
                fclose($handle); // {5}
            }
            else {
                echo "Could not open file: " . $file;
            }
        }
    }
}