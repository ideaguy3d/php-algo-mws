<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/8/2018
 * Time: 8:11 AM
 */

require __DIR__ . '\vendor\autoload.php';

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;

$request = new Request('GET', 'http://jsonplaceholder.typicode.com/post/1');

echo $request->getUri() . "\r\n";

echo $request->getUri()->getScheme() . "\r\n";

echo $request->getUri()->getPort() . "\r\n";

echo $request->getUri()->getHost() . "\r\n";

echo $request->getUri()->getPath() . "\r\n";