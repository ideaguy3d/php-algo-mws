<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Justifying Lines of Text</title>
    <link rel="stylesheet" type="text/css" href="common.css"/>
</head>


<body>

<h1>Justifying Lines of Text</h1>

<?php
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
$myTextJustified = "";
$numLines = substr_count($myText, "\n");
$startOfLine = 0;

for ($i = 0; $i < $numLines; $i++) {
    $originalLineLength = strpos($myText, "\n", $startOfLine) - $startOfLine;
    $justifiedLine = substr($myText, $startOfLine, $originalLineLength);
    $justifiedLineLength = $originalLineLength;

    // keep adding spaces between words until the desired line length is reached
    while( ($i < $numLines - 1) && ($justifiedLineLength < $lineLength) ) {
        // iterate over every single char in the current line
        for($j = 0; $j < $justifiedLineLength; $j++) {
            if($justifiedLineLength < $lineLength && $justifiedLine[$j] == " ") {
                $justifiedLine = substr_replace($justifiedLine, " ", $j, 0);
                $justifiedLineLength++;
                $j++;
            }
        }
    }

    // add the justified line to the string and move to next line
    $myTextJustified .= "$justifiedLine\n";
    $startOfLine += $originalLineLength + 1;
}

?>

<h2>Original text:</h2>
<pre><?php echo $myText ?></pre>

<h2>The Justified text:</h2>
<pre><?php echo $myTextJustified ?></pre>


</body>
</html>