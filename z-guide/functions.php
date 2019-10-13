<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 10/13/2019
 * Time: 12:35 AM
 */

$n = "\n\n";

//-- "Variable Functions" prac:
$i = 2;
function com() {
    echo "\n\n Windows COM \n\n";
}
$foo = 'com';
$foo();


//-- "Return by Reference" prac,
// (these are more useful in classes):
function &refPrac(string $status): string {
    global $n;
    $foo = "$n bar_$status $n";
    echo "$n refPrac() $n";
    return $foo;
}
$someValue = &refPrac('hello');
echo $someValue;
refPrac('world');
echo $someValue;

// return by reference prac2
class SomeRef {
    private $dsn = 'hi';

    function &refPrac2(): string {
        global $n;
        $dsn = $this->dsn;
        $r = rand(0, 10000);
        $this->dsn = "{$n}bar0101{$r}j:$dsn $n";
        return $this->dsn;
    }

    function setDsn (string $v): void {
        $this->dsn = $v;
        $this->refPrac2();
    }
}
$ref = new SomeRef();
$someValue2 = &$ref->refPrac2();
echo $someValue2;
$ref->setDsn('bye');
echo $someValue2;


$break = 'point';







// END OF FILE