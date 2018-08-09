<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 8/2/2018
 * Time: 10:22 AM
 */

$egisPath = "Z:\CLIENTS\NATIONWIDE MKTG";

// depth 1
echo "\n\n Depth 1 - this may take 0.001secs - 0.004secs  \n\n";
$egisFiles = glob($egisPath . "/**/*[eE][gG][iI][sS]*.csv");

// depth 2
echo "\n\n Depth 2 - this may take 1secs - 2secs  \n\n";
$egisFiles = array_merge($egisFiles, glob($egisPath . "/**/**/*[eE][gG][iI][sS]*.csv"));

//--------------------------------------------------
// -- Now the search is going to take a LONG time --
//--------------------------------------------------

// depth 3
echo "\n\n now going Depth 3, this may take 5secs - 10secs  \n\n";
$egisFiles = array_merge($egisFiles, glob($egisPath . "/**/**/**/*[eE][gG][iI][sS]*.csv"));

// depth 4
echo "\n\n And now depth 4... this may take 10secs - 20secs  \n\n";
$egisFiles = array_merge($egisFiles, glob($egisPath . "/**/**/**/**/*[eE][gG][iI][sS]*.csv"));

// depth 5
echo "\n\n ... Here goes depth 5, this may take 30secs - 60secs  \n\n";
$egisFiles = array_merge($egisFiles, glob($egisPath . "/**/**/**/**/**/*[eE][gG][iI][sS]*.csv"));

echo "\n\n <<< egis files are now being moved >>> \n\n";

// Check that all the file names are unique
$uniqueEgisFiles = [];
foreach ($egisFiles as $file) {
    array_push($uniqueEgisFiles, basename($file));
}
$uniqueEgisFiles = array_unique($uniqueEgisFiles);

if (count($uniqueEgisFiles) !== count($egisFiles)) {
    echo "there may be some duplicate file names";
}

// ----------------------------
// -- START MOVING THE FILES --
// ----------------------------
foreach ($egisFiles as $egisFile) {
    rename($egisFile, $egisPath . "\\ALL_EGIS_CSV_FILES\\" . basename($egisFile));
    echo "\n-file moved \n";
}

echo "\n files should be moved ^_^ \n";


//