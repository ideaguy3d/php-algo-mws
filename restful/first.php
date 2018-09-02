<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/8/2018
 * Time: 7:53 AM
 */
require __DIR__ . '\vendor\autoload.php';

use GuzzleHttp\Client;

function jphGetPosts1() {
    $client = new Client(['base_uri' => 'http://jsonplaceholder.typicode.com/']);
    $response = $client->request('GET', 'posts/1');
    echo $response->getBody();
}
