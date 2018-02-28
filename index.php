<?php
/**
 * Created by PhpStorm.
 * User: Lab916
 * Date: 2/8/2018
 * Time: 4:47 PM
 */

echo "<h1>Lab916</h1><hr>";

// print_r(labConversion1());
function labConversion1() {
    $columns = [
        'id serial PRIMARY KEY ',
        'title VARCHAR(255)',
        'author VARCHAR(255)',
        'published_date VARCHAR(255)',
        'image_url VARCHAR(255)',
        'description VARCHAR(255)',
        'created_by VARCHAR(255)',
        'created_by_id VARCHAR(255)',
        'currently_selling VARCHAR(255)'
    ];

    $labMapF = function ($colDef) {
        // echo "<br> In labMap function, colDef = " . $colDef . "<br>";
        return explode(' ', $colDef)[0];
    };

    $colNames = array_map($labMapF, $columns);

    $colText = implode(", ", $columns);

    echo "<br><br> column text = <br> $colText <br><br>";

    return $colNames;
}

// print_r(scrapeOne());
scrapeOne();
function scrapeOne() {
    $ad1 = file_get_contents("http://lab916.wpengine.com/mws/src/MarketplaceWebService/api/report1.php");
    $explode1 = explode('<h2>Report Contents</h2>', $ad1);
    $explode2 = explode(' ', $explode1[1]);
    $columnNames = $explode2[0];
    $explode2b = explode('  ', $explode1[1]);

    // ---------- $rows does work ----------
    $rows = explode("\n", $explode2b[0]);
    // echo "\n ~ The Rows ~ \n";
    // print_r($rows);


    //$columnCellsRow1 = explode('/\t/', $rows[1]);
    $columnCellsRow1 = preg_replace('/\t/', '|', $rows[1]);
    $columnCellsRowVals1 = explode('|', $columnCellsRow1);
    $count = 0;
    $columnCellsRowClean1 = [];
    foreach ($columnCellsRowVals1 as $item) {
        if (str_word_count($item) > 0) {
            $columnCellsRowClean1[$count] = $item;
        }
        $count++;
    }


    echo "\n ~ The Column Cells Row 1 ~ <br> \n";
    print_r($columnCellsRowClean1);
    echo "<br><br>";
    // echo "7th idx = " . str_word_count($columnCellsRowClean1[7]);
}


