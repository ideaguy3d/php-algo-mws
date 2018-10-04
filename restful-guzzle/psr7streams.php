<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/8/2018
 * Time: 8:54 AM
 */
require __DIR__ . '\vendor\autoload.php';
use GuzzleHttp\Psr7;
// use a function inside the Psr7 namespace
$stream = Psr7\stream_for('this is a stream');
echo "\r\n- The Stream: \r\n" . $stream . "\r\n";
echo $stream->getSize() . "\r\n";
echo $stream->isReadable() . "\r\n";
echo $stream->isSeekable() . "\r\n";
echo $stream->isSeekable() . "\r\n";

$stream->write("test");
$stream->rewind();
echo $stream->read(5) . "\r\n";
echo $stream->getContents() . "\r\n";
echo $stream->eof() . "\r\n";