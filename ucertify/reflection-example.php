<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/14/2019
 * Time: 9:23 AM
 */

class myparent
{
    public function foo($bar) {
        // do stuff
    }
}

class mychild extends myparent
{
    public $val;

    private function bar(myparent &$baz) {
        // do stuff
    }

    public function __construct($val) {
        $this->val = $val;
    }
}

// use the classes
$child = new mychild('hello world');
$child->foo('test');

// Here is where reflection is used
$reflect = new ReflectionClass('mychild');
echo $reflect;








//