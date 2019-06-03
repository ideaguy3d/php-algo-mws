<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 10/21/2018
 * Time: 1:48 PM
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Type Specifiers in Action</title>
    <link rel="stylesheet" type="text/css" href="common.css"/>
</head>

<body>

<h1>Type Specifiers in Action</h1>

<?php
$myNumber = 123.45;
//-- basic type specifier types:
printf("Binary: %b<br/>", $myNumber);
printf("Character: %c<br/>", $myNumber);
printf("Decimal: %d<br/>", $myNumber);
printf("Scientific: %e<br/>", $myNumber);
printf("Float: %f<br/>", $myNumber);
printf("Octal: %o<br/>", $myNumber);
printf("String: %s<br/>", $myNumber);
printf("Hex (lower case): %x<br/>", $myNumber);
printf("Hex (upper case): %X<br/>", $myNumber);
//-- signed and unsigned int's:
printf("%d<br/>", 123);   // Displays "123"
printf("%d<br/>", -123);  // Displays "-123"
printf("%+d<br/>", 123);  // Displays "+123"
printf("%+d<br/>", -123); // Displays "-123"

//-- custom characters:
printf("%'#8s", "Hi"); // Displays "######Hi"
printf("%'#-8s", "Hi"); // Displays "Hi######"

//-- number precision:
printf("%f<br />", 123.4567);      // Displays "123.456700" (default precision)
printf("%.2f<br />", 123.4567);  // Displays "123.46"
printf("%.0f<br />", 123.4567);  // Displays "123"
printf("%.10f<br />", 123.4567); // Displays "123.4567000000"'

//-- padding specifier and precision specifier:
echo "<pre>";
printf("%.2f<br />", 123.4567);    // Displays "123.46"
printf("%012.2f<br />", 123.4567); // Displays "000000123.46"
printf("%12.4f<br />", 123.4567);  // Displays "    123.4567"
echo "</pre>";
//-- precision specifiers will truncate:
printf("%.8s\n", "Hello, world!");    // Displays "Hello, w"

//-- swapping arguments:
$mailbox = "Inbox";
$totalMessages = 36;
$unreadMessages = 4;
// template.txt does NOT use "argument positions"
printf(file_get_contents("template.txt"), $totalMessages, $mailbox, $unreadMessages);
// template2.txt DOES use "argument positions"
printf(file_get_contents("template2.txt"), $totalMessages, $mailbox, $unreadMessages);

echo "\nbreakpoint\n";

?>

<h1>sprintf() example code</h1>

<?php
$username = "Matt";
$mailbox = "Inbox";
$totalMessages = 36;
$unreadMessages = 4;
$messageCount = sprintf(
    file_get_contents("template2.txt"), $totalMessages,
    $mailbox, $unreadMessages
);
?>

<p>Welcome, <?php echo $username ?>.</p>
<p class="messageCount"><?php echo $messageCount ?></p>

<h1>Trimming functions</h1>

<?php
$myString = "   What a lot of space!     ";
echo "<pre>";
echo "|" . trim($myString) . "|\n";  // Displays "|What a lot of space!|"
echo "|" . ltrim($myString) . "|\n"; // Displays "|What a lot of space!    |";
echo "|" . rtrim($myString) . "|\n"; // Displays "|   What a lot of space!|";
echo "</pre>";

//-- strip lines, colons, and spaces:
$milton1 = "1:  The mind is its own place, and in it self\n";
$milton2 = "2:  Can make a Heav'n of Hell, a Hell of Heav'n.\n";
$milton3 = "3:  What matter where, if I be still the same,\n";
echo "<pre>";
echo ltrim($milton1, "0..9: ");
echo ltrim($milton2, "0..9: ");
echo ltrim($milton3, "0..9: ");
echo "</pre>";

//-- string padding:
echo '<pre>"';
echo str_pad("Hello, world!", 20); // Displays "Hello, world!       "
echo '"</pre>';
// Displays "Hello, world!*******"
echo str_pad("Hello, world!", 20, "*") . "\n";
// Displays "Hello, world!1231231"
echo str_pad("Hello, world!", 20, "123") . "\n";

/*
can also make str_pad() add padding to the left of the string, or to both the left and the right of the string. To do this, pass an optional fourth argument comprising one of the following built-in constants:
- STR_PAD_RIGHT, to pad the string on the right (the default setting), left-aligning the string
- STR_PAD_LEFT, to pad the string on the left, right-aligning the string
- STR_PAD_BOTH, to pad the string on both the left and the right, centering the result as much as possible
*/
// Displays "***Hello, world!****"
echo str_pad("Hello, world!", 20, "*", STR_PAD_BOTH) . "\n";

//-- Word wrap:
$myString = "But think not that this famous town has only harpooneers, cannibals, and bumpkins to show her visitors. Not at all. Still New Bedford is a queer place. Had it not been for us whalemen, that tract of land would this day perhaps have been in as howling condition as the coast of Labrador.";

echo "<pre>";
// default is 75 chars per line
echo wordwrap($myString);
echo "</pre>";

// change default
$myString = "But think not that this famous town has only harpooneers, cannibals, and bumpkins to show her visitors. Not at all. Still New Bedford is a queer place. Had it not been for us whalemen, that tract of land would this day perhaps have been in as howling condition as the coast of Labrador.";

echo "<pre>";
echo wordwrap($myString, 40);
echo "</pre>";

// split with a new char
$myString = "But think not that this famous town has only harpooneers, cannibals, and bumpkins to show her visitors. Not at all. Still New Bedford is a queer place. Had it not been for us whalemen, that tract of land would this day perhaps have been in as howling condition as the coast of Labrador.";

echo wordwrap($myString, 40, "<br />");

/*
To convert the newlines (\n) in a string to HTML <br /> elements, use PHP's
 >> nl2br() // console "\n\r" to html "<br/>"
*/

//-- wrap string to a specified line width
$myString = "This string has averylongwordindeed.";
echo wordwrap($myString, 10, "<br />");
echo "<br /><br />";
echo wordwrap($myString, 10, "<br />", true);

/*
This
string has
averylongwordindeed.

This
string has
averylongw
ordindeed.
*/

// number format
echo number_format(1234567.89); // Displays "1,234,568"
echo number_format(1234567.89, 1); // Displays "1,234,567.9"
echo number_format(1234567.89, 2, ",", " "); // Displays "1 234 567,89"
echo number_format(1234567.89, 2, ".", ""); // Displays "1234567.89"

// current converting
// http://www.php.net/money_format
// money_format()

//-- Binary Notation:
echo 0b11111;  //binary, To use binary notation, precede the number with 0b
echo 31;  //decimal
echo 0x1f;  //hexadecimal, to use a hexadecimal notation precede the number with 0x
echo 037;  //octal, to use an octal notation precede the number with a zero (0)


?>

</body>
</html>