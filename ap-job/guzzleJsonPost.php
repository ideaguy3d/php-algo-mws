<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 8/3/2018
 * Time: 4:03 PM
 */

require __DIR__ . "/vendor/autoload.php";
use GuzzleHttp\Client;

$postOne = new Client(['base_uri' => 'https://maps.mhetadata.com/api/app/']);

$get1 = file_get_contents("https://maps.mhetadata.com/api/app/hello/world");

$mockData1 = [
    ["name", "city", "state"],
    ["michael", "roseville", "ca"],
    ["julius", "sacramento", "ca"]
];

$r1 = $postOne->request('POST', 'ascii/check2', [
    'json' => $mockData1
]);

$r1 = json_decode($r1->getBody()->getContents());

echo "\n response 1 = \n";
var_dump($r1);