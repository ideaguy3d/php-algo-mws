<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/8/2018
 * Time: 8:29 AM
 */
require __DIR__ . '\vendor\autoload.php';
use GuzzleHttp\Client;
$client = new Client(['base_uri' => 'http://jsonplaceholder.typicode.com/']);
$response = $client->request('GET', 'posts/1');
echo $response->getBody()->getSize() . "\r\n";
echo $response->getBody()->read(20) . "\r\n";
echo $response->getBody()->getSize() . "\r\n";
