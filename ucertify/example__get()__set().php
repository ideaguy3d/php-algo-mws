<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 6/2/2019
 * Time: 7:25 PM
 */

namespace julius\prac;

class Car
{
    public $manufacturer;
    public $model;
    public $color;
    private $_extraData = [];

    public function __get($propName) {
        if (array_key_exists($propName, $this->_extraData)) {
            return $this->_extraData[$propName];
        }
        return null;
    }

    public function __set($propName, $propValue) {
        $this->_extraData[$propName] = $propValue;
    }
}

$car = new Car();

$car->manufacturer = 'nissan';
$car->model = 'sentra';
$car->color = 'brown grey';
$car->engineSize = 1.8;
$car->otherColors = ['green', 'yellow', 'blue', 'red'];

foreach ($car as $item) {
    echo "prop = $item \n";
}

var_dump($car);



//