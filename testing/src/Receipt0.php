<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/2/2018
 * Time: 10:33 AM
 */

namespace TDD;

class Receipt0
{
    public function total(array $items = []) {
        return array_sum($items);
    }

    public function tax($amount, $tax) {
        return ($amount * $tax);
    }
}