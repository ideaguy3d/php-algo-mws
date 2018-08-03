<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 8/2/2018
 * Time: 4:19 PM
 *
 * As of 8-3-2018@2:22pm, I still haven't figured out how to
 * successfully use guzzle
 */


require __DIR__ . "/vendor/autoload.php";

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Pool;
use GuzzleHttp\Promise;

// >getAsync()
// >requestAsync()
// >postAsync()
// >

// ['base_uri' => 'https://maps.mhetadata.com/api/app/']
$client = new Client(['base_uri' => 'https://maps.mhetadata.com']);

$promise1 = $client->requestAsync('GET', 'https://maps.mhetadata.com/api/app/hello/world');

$response1 = $promise1->then(function (ResponseInterface $response) {
    echo "\n\n\n There was a success cb \n\n\n";
    $body = $response->getBody();
    $stringBody = (string)$body;
    //$body->read(10);
    //$result = $body->getContents();
    $result = [
        "data" => $stringBody
    ];
    return $result;
}, function (RequestException $e) {
    echo $e->getMessage() . "\n";
    echo $e->getRequest()->getMethod();
    // echo $e->getRequest()->getReason();
});

$promise1->wait();

$mockData1 = [
    ["name", "city", "state"],
    ["michael", "roseville", "ca"],
    ["julius", "sacramento", "ca"]
];

echo "\n response1 = {$response1["data"]} \n";


$jsonMockData1 = json_encode($mockData1);

echo "<h1>Guzzle API client</h1>";

