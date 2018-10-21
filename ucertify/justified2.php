<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/9/2018
 * Time: 2:27 AM
 */

/*
    //-- string functions used:
    substr_count()
    str_replace()
    substr_replace()
    strpos()
    substr()

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

$myTextJustified = justifyText($myText);

function justifyText (string $myText): string {
    $myText = str_replace("\r\n", "\n", $myText);

    $lineLength = 40;
    $myTextJustified = "";
    $numberOfLines = substr_count($myText, "\n");
    $startOfLine = 0;

    for ($i = 0; $i < $numberOfLines; $i++) {
        $origLineLen = strpos($myText, "\n", $startOfLine) - $startOfLine;
        $justifiedLine = substr($myText, $startOfLine, $origLineLen);
        $justLineLen = $origLineLen;

        // iterate over each line
        while( ($i < $numberOfLines - 1) && ($justLineLen < $lineLength) ) {
            // iterate over each character in line
            for($j = 0; $j < $justLineLen; $j++) {
                if($justLineLen < $lineLength && $justifiedLine[$j] == " ") {
                    $justifiedLine = substr_replace($justifiedLine, " ", $j, 0);
                    $justLineLen++;
                    $j++;
                }
            }
        }

        $myTextJustified .= "$justifiedLine\n";
        $startOfLine += $origLineLen + 1;
    }

    return $myTextJustified;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Justified Script</title>
</head>
<body>

<h1>&nbsp;&nbsp;&nbsp;&nbsp;Justified 2</h1>

<h2>Original text:</h2>
<pre><?php echo $myText ?></pre>

<h2>The Justified text:</h2>
<pre><?php echo $myTextJustified ?></pre>

</body>
</html>
