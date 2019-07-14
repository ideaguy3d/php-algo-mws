<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/14/2019
 * Time: 9:55 AM
 */

class A1
{
    static $word = "hello";

    static function hello() {
        print self::$word;
    }
}

class B1 extends A1
{
    static $word = "bye";
}

echo "\n\n";

// will be "hello"
B1::hello();

echo "\n\n";

// for late static binding, simply change "self" to "static"
class A2
{
    static $word = "hello";

    static function hello() {
        print static::$word;
    }
}

class B2 extends A2
{
    static $word = "bye";
}

echo "\n\n";

// will be "bye"
B2::hello();

echo "\n\n";

















//