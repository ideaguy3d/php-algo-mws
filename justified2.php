<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/9/2018
 * Time: 2:27 AM
 */

/*
    - str_replace()
    - substr_count()
    - strpos()
    - substr()
    - substr_replace()
*/

// The text to justify
$myText = <<< END_TEXT
But think not that this famous town has
only harpooneers, cannibals, and
bumpkins to show her visitors. Not at
all. Still New Bedford is a queer place.
Had it not been for us whalemen, that
tract of land would this day perhaps
have been in as howling condition as the
coast of Labrador.

END_TEXT;

$myText = str_replace("\r\n", "\n", $myText);

$lineLength = 40;
$numLines = substr_count($myText, "\n");
$myJustifiedText = "";
$startOfLine = 0;

for ($i = 0; $i < $numLines; $i++) {
    $originalLineLength = strpos($myText, "\n", $startOfLine) - $startOfLine;
    $justifiedLine = substr($myText, $startOfLine, $originalLineLength);
    $justifiedLineLength = $originalLineLength;
}