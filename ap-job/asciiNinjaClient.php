<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 8/3/2018
 * Time: 4:43 PM
 */

require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/functions.php";

use GuzzleHttp\Client;

$path = 'C:\xampp\htdocs\_z-accuzip';

$ascii1 = "Ï¿½esme";
$asciiSet = [
    ['Ïota', 'what¿', 'ha½lf'],
    ['Šuper', 'Žulu', 'Ÿup']
];

$csvAsciiData = transformCsvToArr($path);

$client = new Client(['base_uri' => 'https://maps.mhetadata.com/api/app/']);

$r1 = $client->request('POST', 'ascii/json', [
    'form_params' => $csvAsciiData
])->getBody()->getContents();

echo "\n response 1 = \n";
var_dump($r1);