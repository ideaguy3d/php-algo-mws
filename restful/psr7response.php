<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/8/2018
 * Time: 8:20 AM
 */
require __DIR__ . '\vendor\autoload.php';
use GuzzleHttp\Client;
$client = new Client(['base_uri' => 'http://jsonplaceholder.typicode.com/']);
$response = $client->request('GET', 'posts/1');
echo $response->getStatusCode() . "\r\n";
echo $response->getReasonPhrase() . "\r\n";

$response = $response->withStatus(418);
echo $response->getStatusCode() . "\r\n";
echo $response->getReasonPhrase() . "\r\n";

$response = $response->withStatus(419, "coffee 1st, everything else 2nd");
echo $response->getStatusCode() . "\r\n";
echo $response->getReasonPhrase() . "\r\n";