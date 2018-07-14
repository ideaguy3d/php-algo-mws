<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/14/2018
 * Time: 12:43 PM
 */

//------------------------------------------
// heredoc prac, heredoc does have parsing
//------------------------------------------

$name = "YHWH";
$myHeredocStr = <<< MY_HEREDOC_PRAC
\n"'I cause to be', says "$name" (who is the "ONE" who 'Causes to be')"\n
MY_HEREDOC_PRAC;

//------------------------------------------
// nowdoc prac, does not have parsing
//------------------------------------------
$myNowdocStr = <<< 'MY_NOWDOC_PRAC'
\n"'I cause to be', says "$name" (who is the "ONE" who 'Causes to be')"\n
MY_NOWDOC_PRAC;


echo $myHeredocStr;
echo "\n\n";
echo $myNowdocStr;
echo "\n\n";