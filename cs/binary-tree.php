<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/17/2019
 * Time: 1:17 AM
 */

namespace julius;

class Node
{
    private $key;
    private $left = null;
    private $right = null;

    public function __construct($key) {
        $this->key = $key;
    }
}

class BinarySearchTree
{
    private $root = null;
}