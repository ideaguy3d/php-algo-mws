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
printf("Binary: %b<br/>", $myNumber);
printf("Character: %c<br/>", $myNumber);
printf("Decimal: %d<br/>", $myNumber);
printf("Scientific: %e<br/>", $myNumber);
printf("Float: %f<br/>", $myNumber);
printf("Octal: %o<br/>", $myNumber);
printf("String: %s<br/>", $myNumber);
printf("Hex (lower case): %x<br/>", $myNumber);
printf("Hex (upper case): %X<br/>", $myNumber);

printf( "%d<br/>", 123 );   // Displays "123"
printf( "%d<br/>", -123 );  // Displays "-123"
printf( "%+d<br/>", 123 );  // Displays "+123"
printf( "%+d<br/>", -123 ); // Displays "-123"

//-- custom characters:
printf( "%'#8s", "Hi" ); // Displays "######Hi"
printf( "%'#-8s", "Hi" ); // Displays "Hi######"

//-- number precision:
printf( "%f<br />", 123.4567 );      // Displays "123.456700" (default precision)
printf( "%.2f<br />", 123.4567 );  // Displays "123.46"
printf( "%.0f<br />", 123.4567 );  // Displays "123"
printf( "%.10f<br />", 123.4567 ); // Displays "123.4567000000"'

//-- padding specifier and precision specifier:
echo "<pre>";
printf( "%.2f<br />", 123.4567 );    // Displays "123.46"
printf( "%012.2f<br />", 123.4567 ); // Displays "000000123.46"
printf( "%12.4f<br />", 123.4567 );  // Displays "    123.4567"
echo "</pre>";
//-- precision specifiers will truncate:
printf( "%.8s\n", "Hello, world!" );    // Displays "Hello, w"

?>

</body>
</html>