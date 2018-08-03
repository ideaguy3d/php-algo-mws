<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 6/21/2018
 * Time: 10:42 AM
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
$client = new Client(['base_uri' => 'https://maps.mhetadata.com/api/app/']);

$promise1 = $client->requestAsync('GET', 'hello/world');

$response1 = $promise1->then(function (ResponseInterface $response) {
    echo "\n\n\n There was a success cb \n\n\n";
    return $response->getBody();
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

echo "\n response1 = \n";
var_dump($response1);

$jsonMockData1 = json_encode($mockData1);

echo "<h1>Guzzle API client</h1>";
