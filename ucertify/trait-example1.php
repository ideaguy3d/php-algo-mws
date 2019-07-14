<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/14/2019
 * Time: 1:56 AM
 */


class BaseClass
{
    public function fun() {
        echo 'Hiii ';
    }
}

trait myTrait
{
    public function fun() {
        parent::fun();
        echo 'John!';
    }
}

class Implementation extends BaseClass
{
    use myTrait;
}

$o = new Implementation();
$o->fun();










//