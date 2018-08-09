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

$p1 = $client->requestAsync('GET', 'https://maps.mhetadata.com/api/app/hello/world');
$p2 = $client->getAsync('hello/world');

$headers = ["x-foo" => "bar"];
$body = "hello world";
$request = new Request('GET', 'https://maps.mhetadata.com/api/app/hello/world', $headers, $body);

$p3 = $client->sendAsync($request);

$response1 = $p1->then(function (ResponseInterface $response) {
    echo "\n\n\n There was a success cb \n\n\n";
    $body = $response->getBody();
    $stringBody = (string)$body;
    //$body->read(10);
    //$result = $body->getContents();
    return $response;
}, function (RequestException $e) {
    echo $e->getMessage() . "\n";
    echo $e->getRequest()->getMethod();
    // echo $e->getRequest()->getReason();
});

$p1->wait();


$mockData1 = [
    ["name", "city", "state"],
    ["michael", "roseville", "ca"],
    ["julius", "sacramento", "ca"]
];


$r1 = $postOne->request('POST', 'ascii/check2', [
    'json' => $mockData1
]);

$r2 = $postOne->request('POST', 'ascii/check2', [
    'body' => $handle
]);

$r1 = json_decode($r1->getBody()->getContents());

echo "\n response 1 = \n";
var_dump($r1);




//